<?php namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CoursesModel;
use App\Models\EnrollModel;

class CoursesController extends BaseController
{
    public function index()
    {
        $model = new CoursesModel();
        $data['courses'] = $model->findAll();
        return view('admin/courses/index', $data); // view sama, role beda
    }

    public function enroll($courseId)
    {
        $enrollModel = new EnrollModel();

        // cek apakah sudah pernah ambil
        $cek = $enrollModel->where('student_id', session()->get('user_id'))
                           ->where('course_id', $courseId)
                           ->first();

        if (!$cek) {
            $enrollModel->insert([
                'student_id' => session()->get('user_id'),
                'course_id'  => $courseId,
            ]);
            return redirect()->to('/courses/my-enrollments')->with('msg', 'Mata kuliah berhasil diambil.');
        }

        return redirect()->back()->with('msg', 'Mata kuliah sudah pernah diambil.');
    }

    public function myEnrollments()
    {
        $enrollModel  = new EnrollModel();
        $coursesModel = new CoursesModel();

        $enrollments = $enrollModel->where('student_id', session()->get('user_id'))->findAll();

        $data['courses'] = [];
        foreach ($enrollments as $enroll) {
            $course = $coursesModel->find($enroll['course_id']);
            if ($course) {
                $data['courses'][] = $course;
            }
        }

        return view('admin/courses/my_enrollments', $data);
    }
}
