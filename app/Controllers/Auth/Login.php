<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session   = session();
    }

    public function index()
    {
        return view('auth/sign-in');
    }

    public function process()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // ================= VALIDASI INPUT =================

        if (empty($email)) {
            return redirect()->back()->with('error', 'Email belum diisi');
        }

        if (empty($password)) {
            return redirect()->back()->with('error', 'Password belum diisi');
        }

        // ================= CEK USER =================

        $user = $this->userModel
            ->where('email', $email)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }

        // ================= CEK PASSWORD =================

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->with('error', 'Password salah');
        }

        // ================= SET SESSION =================

        $sessionData = [
            'id_user'   => $user['id_user'],
            'nama'      => $user['nama'],
            'role'      => $user['role'],
            'logged_in' => true
        ];

        $this->session->set($sessionData);

        // ================= REDIRECT ROLE =================

        switch ($user['role']) {

            case 'admin':
                return redirect()->to('/admin/dashboard');

            case 'kasir':
                return redirect()->to('/kasir/pos');

            case 'owner':
                return redirect()->to('/owner/dashboard');

            default:
                return redirect()->back()->with(
                    'error',
                    'Role pengguna tidak dikenali'
                );
        }
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to('/login');
    }
}