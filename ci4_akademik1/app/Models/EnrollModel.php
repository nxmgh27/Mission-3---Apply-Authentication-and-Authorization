<?php namespace App\Models;

use CodeIgniter\Model;

class EnrollModel extends Model
{
    protected $table = 'std_takes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id','course_id','enroll_date','grade','status'];
}
