<?php namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $session = session();

        return view('dashboard', [
            'username' => $session->get('username'),
            'role'     => $session->get('role'),
        ]);
    }
}
