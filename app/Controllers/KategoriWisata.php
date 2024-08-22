<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class KategoriWisata extends BaseController
{
    protected $KategoriModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->KategoriModel = new \App\Models\KategoriModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $perPage = 5; 
        $data = [
            "title" => "Main Data Kategori Wisata",
            "kategori" => $this->KategoriModel->paginate($perPage, 'kategori'),
            "pager" => $this->KategoriModel->pager,
            "currentPage" => $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1,
            "perPage" => $perPage,
            'session' => session()->get('LoggedIn'),
            'settingWeb' => $this->SettingWebModel->first()
        ];

        return view("admin__section/Data_view/KategoriWisata/v_kategori", $data);
    }

    public function addProcess()
    {
        $kategori = $this->request->getPost('kategori');

        $existingKategori = $this->KategoriModel->where('kategori', $kategori)->first();

        if ($existingKategori) {
            $response = [
                'type' => 'error',
                'text' => 'Kategori sudah ada!'
            ];
        } else {
            $data = [
                'kategori' => $kategori,
            ];
            if ($this->KategoriModel->insert($data)) {
                $response = [
                    'type' => 'success',
                    'text' => 'Kategori berhasil ditambahkan!'
                ];
            } else {
                $response = [
                    'type' => 'error',
                    'text' => 'Gagal menambahkan kategori!'
                ];
            }
        }

        return $this->response->setJSON($response);
    }

    public function editProcess($id)
    {
        $kategori = $this->request->getPost('editKategori'); 
        $data = [
            'kategori' => $kategori
        ];

        if ($this->KategoriModel->update($id, $data)) { 
            $response = [
                'type' => 'success',
                'text' => 'Kategori berhasil diperbarui!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal memperbarui kategori!'
            ];
        }

        return $this->response->setJSON($response);
    }
    public function deleteProcess($id)
    {
        if ($this->KategoriModel->delete($id)) {
            $response = [
                'type' => 'success',
                'text' => 'Kategori berhasil dihapus!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal menghapus kategori!'
            ];
        }
        return $this->response->setJSON($response);
    }
}
