<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table      = 'students';
    protected $primaryKey = 'student_id';
    protected $allowedFields = ['user_id','nim','kelas','semester','entry_year'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
