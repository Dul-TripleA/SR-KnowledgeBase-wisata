<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kecamatan extends BaseController
{
    protected $KecamatanModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->KecamatanModel = new \App\Models\KecamatanModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $perPage = 5;
        $data = [
            "title" => "Main Data Kecamatan Wisata",
            "kecamatan" => $this->KecamatanModel->paginate($perPage, 'kecamatan'),
            "pager" => $this->KecamatanModel->pager,
            "currentPage" => $this->request->getVar('page') ? (int)$this->request->getVar('page') : 1,
            "perPage" => $perPage,
            'session' => session()->get('LoggedIn'),
            'settingWeb' => $this->SettingWebModel->first()
        ];

        return view("admin__section/Data_view/Kecamatan/v_kecamatan", $data);
    }

    public function addProcess()
    {
        $kecamatan = $this->request->getPost('kecamatan');

        $existingKecamatan = $this->KecamatanModel->where('kecamatan', $kecamatan)->first();

        if ($existingKecamatan) {
            $response = [
                'type' => 'error',
                'text' => 'Kecamatan sudah ada!'
            ];
        } else {
            $data = [
                'kecamatan' => $kecamatan,
            ];
            if ($this->KecamatanModel->insert($data)) {
                $response = [
                    'type' => 'success',
                    'text' => 'Kecamatan berhasil ditambahkan!'
                ];
            } else {
                $response = [
                    'type' => 'error',
                    'text' => 'Gagal menambahkan kecamatan!'
                ];
            }
        }

        return $this->response->setJSON($response);
    }

    public function editProcess($id)
    {
        $kecamatan = $this->request->getPost('editKecamatan');
        $data = [
            'kecamatan' => $kecamatan
        ];

        if ($this->KecamatanModel->update($id, $data)) {
            $response = [
                'type' => 'success',
                'text' => 'Kecamatan berhasil diperbarui!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal memperbarui kategkecamatanori!'
            ];
        }

        return $this->response->setJSON($response);
    }
    public function deleteProcess($id)
    {
        if ($this->KecamatanModel->delete($id)) {
            $response = [
                'type' => 'success',
                'text' => 'Kecamatan berhasil dihapus!'
            ];
        } else {
            $response = [
                'type' => 'error',
                'text' => 'Gagal menghapus katkecamatanegori!'
            ];
        }
        return $this->response->setJSON($response);
    }
}
