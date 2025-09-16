<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // kalau bukan admin, tendang balik ke dashboard
        if ($session->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke halaman admin!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // tidak perlu apa-apa
    }
}
