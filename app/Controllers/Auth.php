<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data = ['title' => 'Login'];
        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $sessionData = [
                    'id'         => $user['id'],
                    'username'   => $user['username'],
                    'email'      => $user['email'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                return redirect()->to('/');
            } else {
                return redirect()->to('/login')->with('error', 'Password salah');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Email tidak ditemukan');
        }
    }

    public function register()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        $data = ['title' => 'Registrasi'];
        return view('auth/register', $data);
    }

    public function registerProcess()
    {
        $userModel = new UserModel();

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel->save([
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/')->with('success', 'Berhasil logout');
    }
}
