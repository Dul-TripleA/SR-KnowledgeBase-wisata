<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SettingWebsite extends BaseController
{
    protected $SettingWebModel;
    public function __construct()
    {
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $data = [
            "title" => "Setting Website",
            "session" => session()->get('LoggedIn'),
            "settingWeb" => $this->SettingWebModel->first()
            
        ];
        return view("admin__section/SettingWeb/v_setting", $data);
    }
    public function updateLogo($id)
    {

        try {
            $iconLogo = $this->request->getFile("iconLogo");
            $mainLogo = $this->request->getFile("mainLogo");

            $setting = $this->SettingWebModel->find($id);
            if (!$setting) {
                return $this->response->setJSON([
                    'status' => 404,
                    'message' => "Data tidak ditemukan"
                ]);
            }

            $iconLogoName = $setting['icon_logo'];
            $mainLogoName = $setting['logo_utama'];

            if ($iconLogo && $iconLogo->isValid() && !$iconLogo->hasMoved()) {
                if (file_exists(ROOTPATH . 'public/img/' . $iconLogoName)) {
                    unlink(ROOTPATH . 'public/img/' . $iconLogoName);
                }
                $iconLogoName = $iconLogo->getRandomName();
                $iconLogo->move('img', $iconLogoName);
            }


            if ($mainLogo && $mainLogo->isValid() && !$mainLogo->hasMoved()) {
                if (file_exists(ROOTPATH . 'public/img/' . $mainLogoName)) {
                    unlink(ROOTPATH . 'public/img/' . $mainLogoName);
                }
                $mainLogoName = $mainLogo->getRandomName();
                $mainLogo->move('img', $mainLogoName);
            }

            $data = [
                'icon_logo' => $iconLogoName,
                'logo_utama' => $mainLogoName
            ];

            $this->SettingWebModel->update($id, $data);

            return $this->response->setJSON([
                'status' => 200,
                'message' => 'Logos updated successfully'
            ]);
        } catch (\Exception $e) {
            log_message('error', 'Error in updateLogo: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 500,
                'message' => 'An internal server error occurred'
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateDesc($id)
    {

        try {
            $web_name = $this->request->getPost('web_name');
            $web_desc = $this->request->getPost('deskripsi');
            $email = $this->request->getPost('email');
            $telp = $this->request->getPost('telp');
            $alamat = $this->request->getPost('alamat');
            $u_ig = $this->request->getPost('ig');
            $u_fb = $this->request->getPost('fb');
            $channel = $this->request->getPost('channel');
            $link_ig = $this->request->getPost('link_ig');
            $link_fb = $this->request->getPost('link_fb');
            $link_yt = $this->request->getPost('link_yt');

            $data = [
                "web_name" => $web_name,
                "deskripsi" => $web_desc,
                "email" => $email,
                "telp" => $telp,
                "alamat" => $alamat,
                "u_ig" => $u_ig,
                "u_fb" => $u_fb,
                "channel" => $channel,
                "ig" => $link_ig,
                "fb" => $link_fb,
                "yt" => $link_yt
            ];

            if ($this->SettingWebModel->update($id, $data)) {
                return $this->response->setJSON([
                    'status' => 200,
                    'message' => 'Description updated successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 500,
                    'message' => 'An internal server error occurred'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error in updateLogo: ' . $e->getMessage());
            return $this->response->setJSON([
                'status' => 500,
                'message' => 'An internal server error occurred'
            ])->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
