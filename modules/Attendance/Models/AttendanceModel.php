<?php
namespace Modules\Attendance\Models;


use CodeIgniter\Model;

class AttendanceModel extends \CodeIgniter\Model
{
  protected $table = 'attendance';

  protected $allowedFields = ['enroll_id','date','timein','timeout','user_id','subject','status','created_at','updated_at', 'deleted_at'];

  public function insertAttendance($data = []){
  date_default_timezone_set('Asia/Singapore');
  $data['date'] = date('y-m-d');
  $data['timein'] = date('H:i:s');
  $data['timeout'] = null;
  $data['user_id'] = $_SESSION['uid'];
  $data['status'] = 'present';
  $data['created_at'] = date('y-m-d H:i:s');

  return $this->insert($data);
}
  public function getAttendance($student_id){
    date_default_timezone_set('Asia/Singapore');
    $this->where('enroll_id', $student_id);
    $this->where('date', date('y-m-d'));
    $this->orderBy('id','DESC');
    return $this->findAll();
  }
  public function timeOut($id){
  date_default_timezone_set('Asia/Singapore');
  return $this->where('id', $id)
  ->set(['timeout' => date('H:i:s')])
  ->update();
  }

  public function autoTimeOut($id,$time){
    date_default_timezone_set('Asia/Singapore');
    return $this->where('id', $id)
    ->set(['timeout' => date('H:i:s',strtotime($time))])
    ->update();
    }

  public function absent($data){
    date_default_timezone_set('Asia/Singapore');
    $data['date'] = date('y-m-d');
    $data['timeout'] = null;
    $data['status'] = 'absent';
    $data['created_at'] = date('y-m-d H:i:s');
  
    return $this->insert($data);
  }
  public function getAttendances(){
    $this->select('attendance.id as id, student.stud_num,student.firstname, student.lastname, student.middlename, attendance.timein, attendance.timeout, attendance.date, subjects.subject');
    $this->join('enrollment', 'enrollment.id = attendance.enroll_id');
    $this->join('subjects', 'enrollment.subject_id = subjects.id');
    $this->join('student', 'enrollment.student_id = student.id');
    $this->join('course', 'course.id = student.course_id');
    return $this->findAll();
  }
  public function getAttendancesById($id){
    // SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(attendance.timeout, attendance.timein) ) ) ) as completed_time
    $this->select('enrollment.id, attendance.timein, attendance.timeout');
    $this->join('enrollment', 'enrollment.id = attendance.enroll_id');
    $this->join('subjects', 'enrollment.subject_id = subjects.id');
    $this->join('student', 'enrollment.student_id = student.id');
    $this->join('course', 'course.id = student.course_id');
    $this->where('student.id', $id);
    $this->where('attendance.timeout IS NOT NULL', null, false);
    // $this->groupBy('enrollment.id');
    // print_r($this->findAll());
    // die();
    return $this->findAll();
  }

  public function getAttendancesByEnrollId($id){
    // SEC_TO_TIME( SUM( TIME_TO_SEC( TIMEDIFF(attendance.timeout, attendance.timein) ) ) ) as completed_time
    $this->select('enrollment.id, attendance.timein, attendance.timeout');
    $this->join('enrollment', 'enrollment.id = attendance.enroll_id');
    $this->join('subjects', 'enrollment.subject_id = subjects.id');
    $this->join('student', 'enrollment.student_id = student.id');
    $this->join('course', 'course.id = student.course_id');
    $this->where('enrollment.id', $id);
    $this->where('attendance.timeout IS NOT NULL', null, false);
    // $this->groupBy('enrollment.id');
    // print_r($this->findAll());
    // die();
    return $this->findAll();
  }

  public function getAttendancesNstp1ByEnrollId($id){

    $this->select('attendance.id as id, enrollment.id as enrollment_id, student.stud_num,student.firstname, student.lastname, student.middlename, attendance.timein, attendance.timeout, attendance.date, subjects.subject');
    $this->join('enrollment', 'enrollment.id = attendance.enroll_id');
    $this->join('subjects', 'enrollment.subject_id = subjects.id');
    $this->join('student', 'enrollment.student_id = student.id');
    $this->where('enrollment.id', $id);
    $this->where('attendance.timeout IS NOT NULL', null, false);
    $this->where('subjects.subject', 'NSTP1');
    return $this->findAll();
  }

  public function getAttendancesNstp2ByEnrollId($id){

    $this->select('attendance.id as id, enrollment.id as enrollment_id, student.stud_num,student.firstname, student.lastname, student.middlename, attendance.timein, attendance.timeout, attendance.date, subjects.subject');
    $this->join('enrollment', 'enrollment.id = attendance.enroll_id');
    $this->join('subjects', 'enrollment.subject_id = subjects.id');
    $this->join('student', 'enrollment.student_id = student.id');
    $this->where('enrollment.id', $id);
    $this->where('attendance.timeout IS NOT NULL', null, false);
    $this->where('subjects.subject', 'NSTP2');
    return $this->findAll();
  }


  public function getAttendanceById($id){
    $this->where('id', $id);
    return $this->findAll();
  }
}
