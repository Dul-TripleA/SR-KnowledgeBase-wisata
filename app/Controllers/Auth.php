<?php

namespace App\Controllers;

use Google_Client;

helper('string');
class Auth extends BaseController
{
    protected $googleClient;
    protected $authModel;
    protected $SettingWebModel;
    public function __construct()
    {
        session();
        $this->authModel = new \App\Models\AuthModel();

        $this->googleClient = new Google_Client();

        $this->googleClient->setClientId('');
        $this->googleClient->setClientSecret('');
        $this->googleClient->setRedirectUri('http://localhost:8080/login/process');

        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');

        $this->SettingWebModel = new \App\Models\SettingWebModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Login dulu ya kak',
            'link' => $this->googleClient->createAuthUrl(),
            'setting' => $this->SettingWebModel->first(),
        ];
        return view('auth__section/login/v_login', $data);
    }

    public function process()
    {
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if (!isset($token['error'])) {
            $this->googleClient->setAccessToken($token['access_token']);
            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();

            $password = $data['email'] . "-" . $data["id"];

            $row = [
                'id_user' => $data['id'],
                'email' => $data['email'],
                'username' => $data['name'],
                'profile_pic' => $data['picture'],
                'level' => 2,
                'password' => password_hash($password, PASSWORD_BCRYPT),
            ];

            $existingUser = $this->authModel->getWhere(['email' => $data['email']])->getRow();

            if (!$existingUser) {
                if ($this->authModel->save($row)) {
                    $sessionData = [
                        'id_user' => $row['id_user'],
                        'email' => $row['email'],
                        'username' => $row['username'],
                        'profile_pic' => $row['profile_pic'],
                        'level' => $row['level']
                    ];
                    session()->set('LoggedIn', $sessionData);
                     session()->setFlashdata('login_success', 'Selamat Datang ' . $row['username']);
                    $redirectUrl = ($query->level != 1) ? '/' : '/dashboard';
                } else {
                    return redirect()->to('/register');
                }
            } else {
                $updateData = [
                    'username' => $data['name'],
                    'profile_pic' => $data['picture'],
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                ];
                $this->authModel->update($existingUser->id_user, $updateData);

                $sessionData = [
                    'id_user' => $existingUser->id_user,
                    'email' => $existingUser->email,
                    'username' => $existingUser->username,
                    'profile_pic' => $existingUser->profile_pic,
                    'level' => $existingUser->level
                ];
                session()->set('LoggedIn', $sessionData);

                if ($existingUser->level != 1) {
                     session()->setFlashdata('login_success', 'Selamat Datang ' . $existingUser->username);
                    return redirect()->to('/');
                } else {
                     session()->setFlashdata('login_success', 'Selamat Datang ' . $existingUser->username);
                    return redirect()->to('/dashboard');
                }
            }
        } else {
            return redirect()->to('/error');
        }
    }

    public function login()
    {
        $data = $this->request->getPost();
        $query = $this->authModel->getWhere(['email' => $data['email']])->getRow();
    
        if ($query) {
            if (password_verify($data['password'], $query->password)) {
                $params = [
                    'id_user' => $query->id_user,
                    'email' => $query->email,
                    'username' => $query->username,
                    'profile_pic' => $query->profile_pic,
                    'level' => $query->level
                ];
    
                session()->set('LoggedIn', $params);
                $redirectUrl = ($query->level == 2) ? '/' : '/dashboard';
                
                // Set flash data
                session()->setFlashdata('login_success', 'Selamat Datang ' . $query->username);
                // return redirect()->to($redirectUrl);
    
                return $this->response->setJSON([
                    'status' => 'success',
                    // 'message' => 'Login Anda Sukses '. $query->username,
                    'redirect' => $redirectUrl
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Password Anda Salah'
                    
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Login failed'
            ]);
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar dulu ya kak',
            'link' => $this->googleClient->createAuthUrl(),
            'setting' => $this->SettingWebModel->first(),
        ];

        return view('auth__section/register/v_register', $data);
    }
    public function registerProcess()
    {
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');

        $duplicate_data = $this->authModel->getWhere(['email' => $email])->getRow();

        if ($duplicate_data) {
            return $this->response->setJSON([
                'status' => 'error',
                'type' => 'error_duplicate_email',
                'message' => 'Email already exists.',
            ]);
        }

        // Hash password
        $passwordHash = password_hash($pass, PASSWORD_DEFAULT);
        $id_user = bin2hex(random_bytes(10));
        $q = [
            'id_user' => $id_user,
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash,
            'level' => 2,
            'profile_pic' => 'default.png'
        ];

        if ($this->authModel->save($q)) {
            return $this->response->setJSON([
                'status' => 'success',
                'type' => 'success',
                'message' => 'Registration successful.',
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'type' => 'error',
                'message' => 'Registration failed.',
            ]);
        }
    }


    public function logout()
    {
        session_destroy();
        return redirect()->to('/login');
    }

    public function AllUsers()
    {


        $data = [
            'title' => 'Main Data | Data Users',
            'session' => session()->get('LoggedIn'),
            'users' => $this->authModel->where('level', '2')->findAll(),
            'settingWeb' => $this->SettingWebModel->first()
        ];

        return view('admin__section/Data_view/dataUsers/v_data_user', $data);
    }

    public function deleteUsers($id)
    {

        if ($this->authModel->where('id_user', $id)->delete()) {
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
