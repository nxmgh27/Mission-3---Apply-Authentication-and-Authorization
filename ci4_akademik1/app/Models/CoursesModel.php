<?php namespace App\Models;

use CodeIgniter\Model;

class CoursesModel extends Model
{
    protected $table = 'courses';
    protected $primaryKey = 'course_id';
    protected $allowedFields = ['course_code', 'course_name', 'credits', 'semester'];

    // Aktifkan timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
