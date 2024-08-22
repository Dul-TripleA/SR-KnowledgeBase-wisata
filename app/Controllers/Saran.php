<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Saran extends BaseController
{
    protected $ReviewWebModel;
    protected $SettingWebModel;
    protected $ReviewWisataModel;

    public function __construct()
    {
        $this->ReviewWebModel = new \App\Models\ReviewWebModel();
        $this->SettingWebModel = new \App\Models\SettingWebModel();
        $this->ReviewWisataModel = new \App\Models\ReviewWisataModel();
    }
    public function index()
    {
        $data = [
            "title" => "Ayo Beri Kami Masukan",
            "session" => session()->get('LoggedIn'),
            "setting" => $this->SettingWebModel->first(),
            "gallery" => $this->ReviewWisataModel->orderBy("created_at", "DESC")->where("status", "active")->limit(3)->findAll(),
        ];

        return view("user__section/v_saran", $data);
    }

    public function SaveSaran()
    {
        $id_user = $this->request->getPost('id_user');
        // Get POST data
        $feedback = $this->request->getPost('feedback');
        $rating = $this->request->getPost('rating');

        // Validate input
        if (empty($feedback) || empty($rating)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Feedback and rating are required.'
            ])->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Prepare data for insertion
        $data = [
            'id_user' => $id_user,
            'review' => $feedback,
            'rating' => $rating
        ];

        // Insert data and handle response
        try {
            if ($this->ReviewWebModel->save($data)) {
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
}
