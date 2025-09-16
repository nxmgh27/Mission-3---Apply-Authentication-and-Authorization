<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CoursesModel;

class CoursesController extends BaseController
{
    protected $courseModel;

    public function __construct()
    {
        $this->courseModel = new CoursesModel();
    }

    public function index()
    {
        $data['courses'] = $this->courseModel->findAll();
        return view('admin/courses/index', $data);
    }

    public function create()
    {
        return view('admin/courses/create');
    }

    public function store()
    {
        $this->courseModel->save([
            'course_code' => $this->request->getPost('course_code'),
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
            'semester'    => $this->request->getPost('semester'),
        ]);
        return redirect()->to('admin/courses')->with('msg','Mata kuliah berhasil ditambahkan!');
    }

     public function edit($id)
    {
        $data['course'] = $this->courseModel->find($id);

        if (!$data['course']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mata kuliah dengan ID $id tidak ditemukan");
        }

        return view('admin/courses/edit', $data);
    }


    public function update($id)
    {
        $this->courseModel->update($id, [
            'course_code' => $this->request->getPost('course_code'),
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
            'semester'    => $this->request->getPost('semester'),
        ]);
        return redirect()->to('admin/courses')->with('msg','Mata kuliah berhasil diupdate!');
    }

    public function delete($id)
    {
        $this->courseModel->delete($id);
        return redirect()->to('admin/courses')->with('msg','Mata kuliah berhasil dihapus!');
    }
}
