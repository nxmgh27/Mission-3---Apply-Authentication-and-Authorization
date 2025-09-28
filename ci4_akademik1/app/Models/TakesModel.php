<?php

namespace App\Models;

use CodeIgniter\Model;

class TakesModel extends Model
{
    protected $table         = 'takes';
    protected $primaryKey    = 'id'; // sesuaikan kalau nama PK di tabel kamu beda
    protected $allowedFields = ['student_id', 'course_id'];
    public $useTimestamps    = false;

    // Ambil semua matkul yang diambil mahasiswa
    public function getByStudent($student_id)
    {
        return $this->select('courses.course_code, courses.course_name, courses.credits')
                    ->join('courses', 'courses.course_id = takes.course_id')
                    ->where('takes.student_id', $student_id)
                    ->findAll();
    }
}
