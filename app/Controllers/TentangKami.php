<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class TentangKami extends BaseController
{
    protected $DestinasiWisataModel;
    protected $SimilarityModel;
    protected $SettingWebModel;
    protected $ReviewWisataModel;

    public function __construct()
    {
        $this->DestinasiWisataModel = new \App\Models\DestinasiWisataModel();
        $this->SimilarityModel = new \App\Models\SimilarityModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
        $this->ReviewWisataModel = new \App\Models\ReviewWisataModel();
    }
    public function index()
    {
        
        $data = [
            "title" => "Ini Semua Tentang DolanKuy",
            "jumlahWisata" => $this->DestinasiWisataModel->countAllResults(),
            "jumlahPencarianRekomendasi" => $this->SimilarityModel->groupBy('recommendation_Num')->countAllResults(),
            "setting" => $this->SettingWebModel->first(),
            "session" => session()->get('LoggedIn'),
            "gallery" => $this->ReviewWisataModel->orderBy("created_at", "DESC")->where("status", "active")->limit(3)->findAll(),
        ];
        return view('user__section/v_tentang_kami', $data);
    }
}
