<?php
namespace Modules\Attendance\Models;

use CodeIgniter\Model;

class AttendanceModel extends \CodeIgniter\Model
{
     protected $table = 'attendance';

     protected $allowedFields = ['stud_id','date','timein','timeout','user_id','subject','status','created_at','updated_at', 'deleted_at'];

  public function insertAttendance($data = []){

  $data['date'] = date('y-m-d');
  $data['timein'] = date('h:i:s');
  $data['timeout'] = null;
  $data['user_id'] = 1;
  $data['subject'] = null;

  return $this->insert($data);
}
  public function getAttendance($stud_id){

    $this->where('stud_id', $stud_id);

    return $this->findAll();
  }

}
