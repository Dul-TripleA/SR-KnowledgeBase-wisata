<?php

namespace App\Controllers;

class Home extends BaseController
{
    protected $DestinasiWisataModel;
    protected $ReviewWebModel;
    protected $ReviewWisataModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->DestinasiWisataModel = new \App\Models\DestinasiWisataModel();
        $this->ReviewWebModel = new \App\Models\ReviewWebModel();
        $this->ReviewWisataModel = new \App\Models\ReviewWisataModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index(): string
    {
        $session = session()->get('LoggedIn');
        $wisata = $this->DestinasiWisataModel->findAll();
        $id_wisata_list = array_column($wisata, 'id_wisata');
        $review_counts = [];

        foreach ($id_wisata_list as $id_wisata) {
            $jumlahReviews = $this->ReviewWisataModel->where('id_wisata', $id_wisata)->where('status', 'active')->countAllResults();
            $review_counts[$id_wisata] = $jumlahReviews;
        }
        $data = [
            'title' => 'DolanKuy',
            'wisata' => $this->DestinasiWisataModel->orderBy("avg_rating", "DESC")->limit(6)->findAll(),
            'session' => $session ?? null,
            'review' => $this->ReviewWebModel->limit(6)->joinReviewWebUser(),
            'jumlahReviews' => $review_counts,
            'setting' => $this->SettingWebModel->first(),
            'gallery' => $this->ReviewWisataModel->orderBy("created_at", "DESC")->where("status", "active")->limit(3)->findAll(),
        ];

        return view('user__section/v_home', $data);
    }
}
