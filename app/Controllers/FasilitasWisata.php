<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FasilitasWisata extends BaseController
{
    protected $FasilitasModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->FasilitasModel = new \App\Models\FasilitasModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $perPage = 5;
        $data = [
            "title" => "Main Data Fasilitas Wisata",
            "fasilitas" => $this->FasilitasModel->paginate($perPage, 'fasilitas'),
            "pager" => $this->FasilitasModel->pager,
            "currentPage" => $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1,
            "perPage" => $perPage,
            'session' => session()->get('LoggedIn'),
            'settingWeb' => $this->SettingWebModel->first()
        ];

        return view("admin__section/Data_view/FasilitasWisata/v_fasilitas", $data);
    }

    public function addProcess()
    {
        $fasilitas = $this->request->getPost('fasilitas');

        $existingFasilitas = $this->FasilitasModel->where('fasilitas', $fasilitas)->first();

        if ($existingFasilitas) {
            $response = [
                'type' => 'error',
                'text' => 'Fasilitas sudah ada!'
            ];
        } else {
            $data = [
                'fasilitas' => $fasilitas,
            ];
            if ($this->FasilitasModel->insert($data)) {
                $response = [
                    'type' => 'success',
                    'text' => 'Fasilitas berhasil ditambahkan!'
                ];
            } else {
                $response = [
                    'type' => 'error',
                    'text' => 'Gagal menambahkan fasilitas!'
                ];
            }
        }

        return $this->response->setJSON($response);
    }

    public function editProcess($id)
    {
        $fasilitas = $this->request->getPost('editFasilitas');
        $data = [
            'fasilitas' => $fasilitas
        ];

        if ($this->FasilitasModel->update($id, $data)) {
            $response = [
                'type' => 'success',
                'text' => 'Fasilitas berhasil diperbarui!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal memperbarui fasilitas!'
            ];
        }

        return $this->response->setJSON($response);
    }
    public function deleteProcess($id)
    {
        if ($this->FasilitasModel->delete($id)) {
            $response = [
                'type' => 'success',
                'text' => 'Fasilitas berhasil dihapus!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal menghapus fasilitas!'
            ];
        }
        return $this->response->setJSON($response);
    }
}
