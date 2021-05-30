<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model {

  protected $table = 'students';

  public function getSpecificStudent($student_number){

    $this->where('student_number', $student_number);

    return $this->findAll();
  }

}
