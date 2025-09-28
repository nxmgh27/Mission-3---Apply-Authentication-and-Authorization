<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth/login');
    }

    public function login()
    {
        $session = session();
        $users = new UsersModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $users->where('username', $username)->first();

        // cek password (sementara pakai md5, lebih baik bcrypt)
        if ($user && md5($password) === $user['password']) { 
            $session->set([
                'isLoggedIn' => true,
                'user_id'    => $user['user_id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'full_name'  => $user['full_name'],
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login')->with('error','Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
