<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/sign-in');
    }

    public function process()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->where('email', $email)->first();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $sessionData = [
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'role' => $user['role'],
                    'logged_in' => true
                ];

                $session->set($sessionData);

                if ($user['role'] == 'admin') {
                    return redirect()->to('/admin/dashboard');

                } elseif ($user['role'] == 'kasir') {
                    return redirect()->to('/kasir/pos');

                } elseif ($user['role'] == 'owner') {
                    return redirect()->to('/owner/dashboard');
                }

            } else {
                return redirect()->back()->with('error', 'Password salah');
            }

        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}