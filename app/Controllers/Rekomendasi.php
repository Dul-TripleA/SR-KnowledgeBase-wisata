<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Core\Number;

class Rekomendasi extends BaseController
{
    protected $DestinasiWisataModel;
    protected $SimilarityModel;
    protected $ReviewWisataModel;
    protected $KecamatanModel;
    protected $KategoriModel;
    protected $FasilitasModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->DestinasiWisataModel = new \App\Models\DestinasiWisataModel();
        $this->SimilarityModel = new \App\Models\SimilarityModel();
        $this->ReviewWisataModel = new \App\Models\ReviewWisataModel();
        $this->KecamatanModel = new \App\Models\KecamatanModel();
        $this->KategoriModel = new \App\Models\KategoriModel();
        $this->FasilitasModel = new \App\Models\FasilitasModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }

public function index()
{
    $session = session()->get('LoggedIn');
    $perPage = 4;
    $wisata = $this->DestinasiWisataModel->findAll();
    $id_wisata_list = array_column($wisata, 'id_wisata');
    $review_counts = [];

    foreach ($id_wisata_list as $id_wisata) {
        $jumlahReviews = $this->ReviewWisataModel->where('id_wisata', $id_wisata)->where('status', 'active')->countAllResults();
        $review_counts[$id_wisata] = $jumlahReviews;
    }

    $data = [
        'title' => 'Rekomendasi Destinasi Wisata',
        'wisata' => $this->DestinasiWisataModel->paginate($perPage, 'rekomendasi'),
        "pager" => $this->DestinasiWisataModel->pager,
        "currentPage" => $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1,
        "perPage" => $perPage,
        'totalPages' => $this->DestinasiWisataModel->pager->getPageCount(),
        'session' => $session ?? null,
        'jumlahReviewer' => $review_counts,
        'kecamatan' => $this->KecamatanModel->findAll(),
        'fasilitas' => $this->FasilitasModel->findAll(),
        'kategori' => $this->KategoriModel->findAll(),
        'setting' => $this->SettingWebModel->first(),
        'gallery' => $this->ReviewWisataModel->orderBy("created_at", "DESC")->where("status", "active")->limit(3)->findAll(),
        'harga_tiket_tertinggi' => $this->DestinasiWisataModel->orderBy('harga_tiket', 'DESC')->first()['harga_tiket'],
    ];

    if ($this->request->getPost()) {
        try {
            if ($this->request->getPost('id_user') == null) {
                $userId = 'unknown';
            } else {
                $userId = $this->request->getPost('id_user');
            }

            $lastRecommendationNumber = $this->SimilarityModel->groupBy('recommendation_Num')->orderBy('recommendation_Num', 'DESC')->first();

            if ($lastRecommendationNumber) {
                $recommendation_Num = $lastRecommendationNumber['recommendation_Num'] + 1;
            } else {
                $recommendation_Num = 1;
            }

            $bobot_atribut = floatval(1 / 5);

            $kategori = $this->request->getPost('kategori') ?? [];
            $query = $this->DestinasiWisataModel->findAll();
            $harga_tiket = floatval($this->request->getPost('harga_tiket') ?? 0);
            $lokasi = $this->request->getPost('lokasi') ?? "";
            $rating = floatval($this->request->getPost('rating') ?? 0);
            $fasilitas = $this->request->getPost('fasilitas') ?? [];

            // Maintain all results
            $all_results = [];
            $filtered_results = [];

            if ($query) {
                // Get highest values for normalization
                $d = $this->DestinasiWisataModel->orderBy('harga_tiket', 'DESC')->first();
                $q = $this->DestinasiWisataModel->orderBy('avg_rating', 'DESC')->first();

                $harga_tiket_tertinggi = floatval($d['harga_tiket']);
                $rating_tertinggi = floatval($q['avg_rating']);

                foreach ($query as $item) {
                    $fasilitas_array = json_decode($item['fasilitas'], true);
                    $kategori_array = json_decode($item['kategori'], true);
                    $gambar_array = json_decode($item['gambar'], true);

                    // Handle JSON decoding errors
                    if ($fasilitas_array === null) {
                        $fasilitas_array = [];
                    }
                    if ($kategori_array === null) {
                        $kategori_array = [];
                    }
                    if ($gambar_array === null || !is_array($gambar_array) || empty($gambar_array)) {
                        $gambar_array = [];
                    }

                    $gambar_pertama = !empty($gambar_array) ? $gambar_array[0] : '';

                    $kategori_score = count(array_intersect($kategori, $kategori_array)) > 0 ? 1 * $bobot_atribut : 0;
                    $fasilitas_score = count(array_intersect($fasilitas, $fasilitas_array)) > 0 ? 1 * $bobot_atribut : 0;

                    // Calculate similarity scores
                    $similarity_details = $this->calculateSimilarity(
                        $kategori_score,
                        $harga_tiket,
                        $lokasi,
                        $rating,
                        $item,
                        $bobot_atribut,
                        $harga_tiket_tertinggi,
                        $fasilitas_score,
                        $rating_tertinggi,
                    );

                    // Convert arrays to strings for JSON output
                    $item['fasilitas'] = implode(', ', $fasilitas_array);
                    $item['kategori'] = implode(', ', $kategori_array);
                    $item['gambar'] = $gambar_pertama;

                    $details = $similarity_details['details'];

                    $result = [
                        'item' => $item,
                        'jumlah_reviewer' => $review_counts[$item['id_wisata']],
                        'similarity' => round($similarity_details['total_score'], 3),
                        'details' => $details,
                    ];

                    // Insert into SimilarityModel
                    $row = [
                        "id_wisata" => $item['id_wisata'],
                        "id_user" => $userId,
                        "sim_kategori" => $details['kategori_score'],
                        "sim_harga_tiket" => $details['harga_tiket_score'],
                        "sim_lokasi" => $details['lokasi_score'],
                        "sim_rating" => $details['rating_score'],
                        "sim_fasilitas" => $details['fasilitas_score'],
                        "similarity" => round($similarity_details['total_score'], 3),
                        "recommendation_Num" => $recommendation_Num
                    ];

                    $this->SimilarityModel->insert($row);

                    // ambil semua result
                    $all_results[] = $result;

                    // ambil result berdasarkan filter
                    if (!empty(array_intersect($kategori, $kategori_array)) || stripos($item['lokasi_kec'], $lokasi) !== false) {
                        $filtered_results[] = $result;
                    }
                    
                }

                // urutkan berdasarkan simmilarity tertinggi
                usort($filtered_results, function ($a, $b) {
                    return $b['similarity'] <=> $a['similarity'];
                });

                // Return 
                return $this->response->setJSON($filtered_results);
            } else {
                return $this->response->setJSON(['error' => 'No data found']);
            }
        } catch (\Exception $e) {
            return $this->response->setStatusCode(500)->setJSON(['error' => $e->getMessage()]);
        }
    }

    return view('user__section/v_rekomendasi', $data);
}


    private function calculateSimilarity($kategori_score, $harga_tiket, $lokasi, $rating, $item, $bobot_atribut, $harga_tiket_tertinggi, $fasilitas_score, $rating_tertinggi)
    {
        // Calculate scores for individual attributes
        $lokasi_score = ($lokasi == $item['lokasi_kec']) ? 1 : 0;

        // Handle zero division case for harga_tiket_tertinggi
        if ($harga_tiket_tertinggi == 0) {
            $harga_tiket_score = ($item['harga_tiket'] == $harga_tiket) ? $bobot_atribut : 0;
        } else {
            $harga_tiket_score = $bobot_atribut * (1 - abs($item['harga_tiket'] - $harga_tiket) / $harga_tiket_tertinggi);
        }

        // Handle zero division case for rating_tertinggi
        if ($rating_tertinggi == 0) {
            $rating_score = ($item['avg_rating'] == $rating) ? $bobot_atribut : 0;
        } else {
            $rating_score = $bobot_atribut * (1 - abs($item['avg_rating'] - $rating) / $rating_tertinggi);
        }

        // Calculate total score by combining individual attribute scores
        $total_score = abs($kategori_score) + abs($harga_tiket_score) + abs($lokasi_score * $bobot_atribut) + abs($rating_score) + abs($fasilitas_score);
        // $total_score = $kategori_score + $harga_tiket_score + ($lokasi_score * $bobot_atribut) + $rating_score + $fasilitas_score;

        // Return the total score and details of individual attribute scores
        return [
            'total_score' => $total_score,
            'details' => [
                'kategori_score' => $kategori_score,
                'harga_tiket_score' => $harga_tiket_score,
                'lokasi_score' => $lokasi_score * $bobot_atribut,
                'rating_score' => $rating_score,
                'fasilitas_score' => $fasilitas_score
            ]
        ];
    }

    public function detailWisata($nama_wisata)
    {
        $session = session()->get('LoggedIn');

        $wisata = $this->DestinasiWisataModel->Where('nama_wisata', $nama_wisata)->get()->getRow();
        $gambar = json_decode($wisata->gambar, true);

        $review = $this->ReviewWisataModel->select('tb_review.*, tb_auth.username, tb_destinasi_wisata.nama_wisata')
            ->Where('tb_review.id_wisata', $wisata->id_wisata)
            ->join('tb_auth', 'tb_review.id_user = tb_auth.id_user')
            ->join('tb_destinasi_wisata', 'tb_review.id_wisata = tb_destinasi_wisata.id_wisata')
            ->where('tb_review.status', 'active')
            ->get()
            ->getResultArray();

        // dd($review);

        // dd($review);
        $data = [
            'title' => 'Detail Wisata',
            'wisata' => $wisata,
            'gambar' => $gambar,
            'session' => $session,
            'review' => $review,
            'jumlahReviews' => $this->ReviewWisataModel->where('id_wisata', $wisata->id_wisata)->where('status', 'active')->countAllResults(),
            'gallery' => $this->ReviewWisataModel->orderBy("created_at", "DESC")->where("status", "active")->limit(3)->findAll(),
            'setting' => $this->SettingWebModel->first()
        ];

        return view('user__section/v_detail_wisata', $data);
    }

    public function saveReview()
    {

        $id_user = $this->request->getPost('id_user');
        $id_wisata = $this->request->getPost('id_wisata');
        $komentar = $this->request->getPost('komentar');
        $rating = $this->request->getPost('rating');
        $gambar = $this->request->getFile('gambar') ?? "";

        if (empty($komentar) || empty($rating)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Feedback and rating are required.'
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambarPath = $gambar->getRandomName();
            $gambar->move('img', $gambarPath);
        } else {
            session()->setFlashdata('upload_error', $gambar->getErrorString());
            return redirect()->back()->withInput();
        }

        $data = [
            'id_user' => $id_user,
            'id_wisata' => $id_wisata,
            'komen' => $komentar,
            'rating' => $rating,
            'gambar' => $gambarPath,
            'status' => "active"
        ];
        try {
            if ($this->ReviewWisataModel->insert($data)) {
                $n = $this->ReviewWisataModel->where('id_wisata', $id_wisata)->where('status', 'active')->countAllResults();
                $jumlahRating = $this->ReviewWisataModel->selectSum('rating')->where('id_wisata', $id_wisata)->where('status', 'active')->get()->getRow()->rating;
                $avg_rating = number_format(floatval($jumlahRating / $n), 1);

                $this->DestinasiWisataModel->update($id_wisata, ['avg_rating' => $avg_rating]);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Feedback submitted successfully!'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to submit feedback.'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An unexpected error occurred.'
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateStatusReview(){
        $reviewId = $this->request->getPost('id_review');
        $review = $this->ReviewWisataModel->where('id_review', $reviewId)->first();
        $response = [
            'success' => false,
            'message' => 'Invalid request'
        ];

        if ($review) {
            $currentStatus = $review['status'];
            $newStatus = ($currentStatus === 'active') ? 'inactive' : 'active';

            if ($this->ReviewWisataModel->update($reviewId, ['status' => $newStatus])) {
                $n = $this->ReviewWisataModel->where('id_wisata', $review['id_wisata'])->where('status', 'active')->countAllResults();

                if ($n > 0) {
                    $jumlahRating = $this->ReviewWisataModel->selectSum('rating')->where('id_wisata', $review['id_wisata'])->where('status', 'active')->get()->getRow()->rating;
                    $avg_rating = number_format(floatval($jumlahRating / $n), 1);
                } else {
                    $avg_rating = 0;
                }

                $this->DestinasiWisataModel->update($review['id_wisata'], ['avg_rating' => $avg_rating]);

                $response['success'] = true;
                $response['message'] = 'Review ' . ($newStatus === 'active' ? 'activated' : 'deactivated') . ' successfully';
            } else {
                $response['message'] = 'Failed to ' . ($newStatus === 'active' ? 'activate' : 'deactivate') . ' review';
            }
        }

        return $this->response->setJSON($response);
    }
}
