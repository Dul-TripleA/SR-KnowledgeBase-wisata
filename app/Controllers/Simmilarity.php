<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Simmilarity extends BaseController
{
    protected $SimilarityModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->SimilarityModel = new \App\Models\SimilarityModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Simmilarity | Riwayat Rekomendasi',
            'session' => session()->get('LoggedIn'),
            'history' => $this->SimilarityModel->GetDataJoinDataSimWisataUser(),
            'settingWeb' => $this->SettingWebModel->first()
        ];
        return view('admin__section/Historys_Recommendation/Riwayat_Rekomendasi/v_riwayat_rekomendasi', $data);
    }

    public function unknownUser()
    {

        $data = [
            'title' => 'Simmilarity | Riwayat Rekomendasi Unknown User',
            'session' => session()->get('LoggedIn'),
            'history' => $this->SimilarityModel->GetDataJoinDataSimWisata(),
            'settingWeb' => $this->SettingWebModel->first()
        ];
        return view('admin__section/Historys_Recommendation/Riwayat_Rekomendasi_unKnownUser/v_riwayat_rekomendasi', $data);
    }

    public function detailHistory($recommendation_Num)
    {
        // Ambil semua data yang memiliki nomor rekomendasi yang sama
        $historyData = $this->SimilarityModel
            ->select('tb_similarity.*, tb_destinasi_wisata.nama_wisata, tb_auth.username')
            ->join('tb_destinasi_wisata', 'tb_similarity.id_wisata = tb_destinasi_wisata.id_wisata')
            ->join('tb_auth', 'tb_similarity.id_user = tb_auth.id_user')
            ->where('recommendation_Num', $recommendation_Num)
            ->findAll();

        $recommendationResult = $this->SimilarityModel
            ->select('tb_similarity.*, tb_destinasi_wisata.nama_wisata, tb_auth.username')
            ->join('tb_destinasi_wisata', 'tb_similarity.id_wisata = tb_destinasi_wisata.id_wisata')
            ->join('tb_auth', 'tb_similarity.id_user = tb_auth.id_user')
            ->where('recommendation_Num', $recommendation_Num)
            ->orderBy('tb_similarity.similarity', 'DESC')
            ->first();

        $data = [
            'title' => 'Simmilarity | Detail Riwayat Rekomendasi | ' . $recommendation_Num,
            'session' => session()->get('LoggedIn'),
            'hasilRekomendasi' => $recommendationResult,
            'history' => $historyData,
            'settingWeb' => $this->SettingWebModel->first()
        ];

        // Kembalikan tampilan dengan data yang dikirim
        return view('admin__section/Historys_Recommendation/Riwayat_Rekomendasi/v_detail_riwayat', $data);
    }
    public function detailHistoryUnknownUser($recommendation_Num)
    {
        // Ambil semua data yang memiliki nomor rekomendasi yang sama
        $historyData = $this->SimilarityModel
            ->select('tb_similarity.*, tb_destinasi_wisata.nama_wisata')
            ->join('tb_destinasi_wisata', 'tb_similarity.id_wisata = tb_destinasi_wisata.id_wisata')
            ->where('recommendation_Num', $recommendation_Num)
            ->findAll();

        $recommendationResult = $this->SimilarityModel
            ->select('tb_similarity.*, tb_destinasi_wisata.nama_wisata')
            ->join('tb_destinasi_wisata', 'tb_similarity.id_wisata = tb_destinasi_wisata.id_wisata')
            ->where('recommendation_Num', $recommendation_Num)
            ->orderBy('tb_similarity.similarity', 'DESC')
            ->first();


        // Buat array data untuk dikirim ke view
        $data = [
            'title' => 'Simmilarity | Detail Riwayat Rekomendasi | ' . $recommendation_Num,
            'session' => session()->get('LoggedIn'),
            'hasilRekomendasi' => $recommendationResult,
            'history' => $historyData,
            'settingWeb' => $this->SettingWebModel->first()
        ];

        // Kembalikan tampilan dengan data yang dikirim
        return view('admin__section/Historys_Recommendation/Riwayat_Rekomendasi_unKnownUser/v_detail_riwayat', $data);
    }

    public function deleteHistory($recommendation_Num)
    {

        if ($this->SimilarityModel->where('recommendation_Num', $recommendation_Num)->delete()) {
            $response = [
                'type' => 'success',
                'text' => 'Riwayat Rekomendasi Berhasil dihapus!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal menghapus Riwayat Rekomendasi!'
            ];
        }

        return $this->response->setJSON($response);
    }
}
