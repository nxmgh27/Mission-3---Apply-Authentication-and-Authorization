<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentsModel;
use App\Models\UsersModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class StudentsController extends BaseController
{
    protected $studentModel;
    protected $userModel;

    public function __construct()
    {
        $this->studentModel = new StudentsModel();
        $this->userModel    = new UsersModel();
    }

    public function index()
    {
        $data['students'] = $this->studentModel
                                ->select('students.*, users.username, users.full_name')
                                ->join('users', 'users.user_id = students.user_id')
                                ->findAll();

        return view('admin/students/index', $data);
    }

    public function create()
    {
        return view('admin/students/create');
    }

    public function store()
    {
        
        $userId = $this->userModel->insert([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ]);
        $this->studentModel->insert([
            'user_id'    => $userId,
            'nim'        => $this->request->getPost('nim'),
            'kelas'      => $this->request->getPost('kelas'),
            'semester'   => $this->request->getPost('semester'),
            'entry_year' => $this->request->getPost('entry_year'),
        ]);

        return redirect()->to('admin/students')->with('msg', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $student = $this->studentModel
                        ->select('students.*, users.user_id, users.username, users.full_name')
                        ->join('users', 'users.user_id = students.user_id')
                        ->where('students.student_id', $id)
                        ->first();

        if (!$student) {
            throw PageNotFoundException::forPageNotFound("Mahasiswa dengan ID $id tidak ditemukan.");
        }

        return view('admin/students/edit', ['student' => $student]);
    }

    public function update($id)
    {
    
        $this->userModel->update($this->request->getPost('user_id'), [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->studentModel->update($id, [
            'nim'        => $this->request->getPost('nim'),
            'kelas'      => $this->request->getPost('kelas'),
            'semester'   => $this->request->getPost('semester'),
            'entry_year' => $this->request->getPost('entry_year'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('admin/students')->with('msg', 'Data mahasiswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->studentModel->delete($id);
        return redirect()->to('admin/students')->with('msg', 'Mahasiswa dihapus.');
    }
}
