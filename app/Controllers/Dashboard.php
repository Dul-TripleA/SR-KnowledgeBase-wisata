<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    protected $DestinasiWisataModel;
    protected $SimilarityModel;
    protected $ReviewWisataModel;
    protected $AuthModel;
    protected $ReviewWebModel;
    protected $SettingWebModel;

    public function __construct()
    {
        $this->DestinasiWisataModel = new \App\Models\DestinasiWisataModel();
        $this->SimilarityModel = new \App\Models\SimilarityModel();
        $this->ReviewWisataModel = new \App\Models\ReviewWisataModel();
        $this->AuthModel = new \App\Models\AuthModel();
        $this->ReviewWebModel = new \App\Models\ReviewWebModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }
    public function index()
    {
        $limit = 6;
        $unknownUserHistoryrecommendation= $this->SimilarityModel->GetDataJoinDataSimWisata($limit);
        $historyrecommendation = $this-> SimilarityModel->GetDataJoinDataSimWisataUser($limit);
        
        $n = $this->ReviewWebModel->countAll();
        $jumlahRating = $this->ReviewWebModel->selectSum('rating')->get()->getRow()->rating;
        
        if($n == 0){
            $avg_rating = 0;
        }
        $avg_rating = number_format(floatval($jumlahRating / $n), 1);
        

        $session = session()->get('LoggedIn');
        $data = [
            'title' => 'Dashboard Admin DolanKuy',
            'historyRecommendation' => $historyrecommendation,
            'unknownUserHistoryrecommendation' => $unknownUserHistoryrecommendation,
            'session' => $session,
            'review' => $this->ReviewWisataModel->getReview(),
            'jumlahUser' => $this->AuthModel->where("level", 2)->Where("deleted_at", null)->countAllResults(),
            'jumlahWisata' => $this->DestinasiWisataModel->countAll(),
            'jumlahRekomendasi' => $this->SimilarityModel->groupBy('recommendation_Num')->countAllResults(),
            'rating' => $avg_rating,
            'settingWeb' => $this->SettingWebModel->first()
        ];

        
        return view('admin__section/v_dashboard', $data);
    }
}
