<?php namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model{

  protected $table = 'attendance';

  protected $allowedFields = ['stud_id', 'date', 'timein', 'timeout', 'user_id', 'totalhrs', 'subject_id', 'created_at', 'updated_at', 'deleted_at'];

  public function insertAttendance($data = []){

    $data['date'] = date('y-m-d');
    $data['timein'] = date('h:i:s');
    $data['timeout'] = null;
    $data['user_id'] = 1;
    $data['total_hours'] = null;
    $data['subject_id'] = 1;

    return $this->insert($data);
  }

  public function timeOut($student_id){
    $this->whereIn('stud_id', [$student_id])
    ->set(['timeout' => time()])
    ->update();
  }

  public function getAttendance($student_id){

    $this->where('stud_id', $student_id);

    return $this->findAll();
  }


}
