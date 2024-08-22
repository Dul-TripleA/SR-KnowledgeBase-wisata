<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DestinasiWisataModel;
use CodeIgniter\API\ResponseTrait;

class DestinasiWisata extends BaseController
{
    use ResponseTrait;

    protected $DestinasiWisataModel;
    protected $KategoriModel;
    protected $FasilitasModel;
    protected $KecamatanModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->DestinasiWisataModel = new \App\Models\DestinasiWisataModel();
        $this->KategoriModel = new \App\Models\KategoriModel();
        $this->FasilitasModel = new \App\Models\FasilitasModel();
        $this->KecamatanModel = new \App\Models\KecamatanModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Main Data Destinasi Wisata',
            'destinasiWisata' => $this->DestinasiWisataModel->findAll(),
            'session' => session()->get("LoggedIn"),
            'settingWeb' => $this->SettingWebModel->first()
        ];
        return view('admin__section/Data_view/destinasiWisata/v_destinasi_wisata', $data);
    }
    public function addDestinasi()
    {
        $data = [
            'title' => 'Add Data Destinasi Wisata',
            'kategori' => $this->KategoriModel->findAll(),
            'kecamatan' => $this->KecamatanModel->findAll(),
            'fasilitas' => $this->FasilitasModel->findAll(),
            'session' => session()->get("LoggedIn"),
            'settingWeb' => $this->SettingWebModel->first()
        ];
        return view('admin__section/Data_view/destinasiWisata/v_add_destinasi_wisata', $data);
    }
    public function addProcess()
    {
        $destinasiWisata = $this->request->getPost('destinasi_wisata');
        $hargaTiket = $this->request->getPost('harga_tiket');
        $lokasi = $this->request->getPost('lokasi');
        $alamat = $this->request->getPost('alamat');
        $link_gmaps = $this->request->getPost('link_gmaps');
        $deskripsi = $this->request->getPost('deskripsi');
        $kategoriWisataJson = $this->request->getPost('kategori_wisata_hidden') ?? "";
        $fasilitasWisataJson = $this->request->getPost('fasilitas_wisata_hidden') ?? "";


        $kategoriWisata = json_decode($kategoriWisataJson, true);
        $fasilitasWisata = json_decode($fasilitasWisataJson, true);


        if (!is_array($kategoriWisata)) {
            $kategoriWisata = [];
        }
        if (!is_array($fasilitasWisata)) {
            $fasilitasWisata = [];
        }

        $files = $this->request->getFiles("file") ? $this->request->getFiles("file")['file'] : [];
        $uploadedFiles = [];
        foreach ($files as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('img', $newName);
                $uploadedFiles[] = $newName;
            } else {
                session()->setFlashdata('upload_error', $file->getErrorString());
                return redirect()->back()->withInput();
            }
        }

        $IdNum = random_int(10000000000, 99999999999);

        $data = [
            'id_wisata' => $IdNum,
            'nama_wisata' => $destinasiWisata,
            'harga_tiket' => $hargaTiket,
            'lokasi_kec' => $lokasi,
            'alamat' => $alamat,
            'link_gmaps' => $link_gmaps,
            'deskripsi' => $deskripsi,
            'kategori' => json_encode($kategoriWisata),
            'fasilitas' => json_encode($fasilitasWisata),
            'gambar' => json_encode($uploadedFiles),
        ];

        $destinasiModel = new DestinasiWisataModel();
        if ($destinasiModel->insert($data)) {
            // return redirect()->to('/dashboard')->with('message', 'Data has been saved successfully.');
            return $this->respond(['success' => true]);
        } else {
            // return redirect()->back()->with('error', 'Failed to save data.');
            return $this->failNotFound(false);
        }
    }

    public function editDestinasi($id_wisata)
    {

        $data = [
            'title' => 'Edit Data Destinasi Wisata',
            'wisata' => $this->DestinasiWisataModel->find($id_wisata),
            'session' => session()->get("LoggedIn"),
            'settingWeb' => $this->SettingWebModel->first(),
            'fasilitas' => $this->FasilitasModel->findAll(),
            'kategori' => $this->KategoriModel->findAll(),
            'kecamatan' => $this->KecamatanModel->findAll(),
        ];

        return view('admin__section/Data_view/destinasiWisata/v_edit_destinasi_wisata', $data);
    }

    public function editProcess($id_wisata)
    {
        $kategoriJSON = $this->request->getPost('kategori_wisata_hidden');
        $kategori = json_decode($kategoriJSON, true);
        $fasilitasJSON = $this->request->getPost('fasilitas_wisata_hidden');
        $fasilitas = json_decode($fasilitasJSON, true);

        $data = [
            'nama_wisata' => $this->request->getPost('destinasi_wisata'),
            'kategori' => json_encode($kategori),
            'harga_tiket' => $this->request->getPost('harga_tiket'),
            'lokasi_kec' => $this->request->getPost('lokasi'),
            'alamat' => $this->request->getPost('alamat'),
            'link_gmaps' => $this->request->getPost('link_gmaps'),
            'fasilitas' => json_encode($fasilitas),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        // Handle existing images
        $existingImages = $this->request->getPost('existing_images');
        if ($existingImages) {
            $data['gambar'] = $existingImages;
        } else {
            $data['gambar'] = [];
        }

        // Handle file uploads
        $files = $this->request->getFiles(); // Fetch all files from the request
        if ($files) {
            foreach ($files['file'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move('img/', $newName);
                    $data['gambar'][] = $newName; // Append new files to the array
                }
            }
        }

        // Delete images that are no longer in the updated array
        $oldImages = json_decode($this->DestinasiWisataModel->find($id_wisata)['gambar'], true);
        $imagesToDelete = array_diff($oldImages, $data['gambar']);
        foreach ($imagesToDelete as $imageToDelete) {
            if (file_exists(ROOTPATH . 'public/img/' . $imageToDelete)) {
                unlink(ROOTPATH . 'public/img/' . $imageToDelete);
            }
        }

        $data['gambar'] = json_encode($data['gambar']); // Encode the array to JSON

        if ($this->DestinasiWisataModel->update($id_wisata, $data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update data']);
        }
    }

    public function deleteDestinasi($id_wisata)
    {
        try {
            // Retrieve old images
            $oldImages = json_decode($this->DestinasiWisataModel->find($id_wisata)['gambar'], true);

            // Check and delete each image if it exists
            if (is_array($oldImages)) {
                foreach ($oldImages as $oldImage) {
                    $imagePath = ROOTPATH . 'public/img/' . $oldImage;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }

            // Delete the record from the database
            if ($this->DestinasiWisataModel->delete($id_wisata)) {
                $response = [
                    'type' => 'success',
                    'text' => 'Destinasi berhasil dihapus!'
                ];
            } else {
                $response = [
                    'type' => 'error',
                    'text' => 'Gagal menghapus destinasi!'
                ];
            }
        } catch (\Exception $e) {
            // Log the error
            log_message('error', $e->getMessage());
            $response = [
                'type' => 'error',
                'text' => 'Terjadi kesalahan: ' . $e->getMessage()
            ];
        }

        return $this->response->setJSON($response);
    }
}
