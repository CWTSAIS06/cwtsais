<?php
namespace Modules\StudentManagement\Models;

use CodeIgniter\Model;

class EnrollModel extends \CodeIgniter\Model
{
     protected $table = 'enrollment';

     protected $allowedFields = ['id','student_id','stud_num','subject_id','schyear_id','required_hrs','accumulated_hrs','professor_id','day','start_time','end_time','status','created_at','deleted_at','updated_at'];

     public function getSpecificStudent($stud_num){

       $this->where('stud_num', $stud_num);

       return $this->findAll();
     }

     public function getStudents(){
       $this->select('enrollment.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject, enrollment.required_hrs,enrollment.accumulated_hrs');
       $this->join('student', 'student.id = enrollment.student_id');
       $this->join('subjects  ', 'subjects.id = enrollment.subject_id');
       $this->join('course', 'student.course_id = course.id');
      //  $this->where('enrollment.status', 'i');
       return $this->findAll();
     }

     public function getStudentsByCourseYS($course_id, $year, $section, $gender){
      $this->select('enrollment.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject, enrollment.required_hrs,enrollment.accumulated_hrs, enrollment.start_time, enrollment.end_time, enrollment.status,enrollment.day');
      $this->join('student', 'student.id = enrollment.student_id');
      $this->join('subjects  ', 'subjects.id = enrollment.subject_id');
      $this->join('course', 'student.course_id = course.id');

      if($course_id !== 'all'){
        $this->where('student.course_id', $course_id);
      }

      if($year !== 'all'){
        $this->where('student.year_id', $year);
      }

      if($section !== 'all'){
        $this->where('student.section_id', $section);
      }
      
      if($gender !== 'all'){
        $this->where('student.gender', $gender);
      }

      $this->where('enrollment.status', 'i');
      return $this->findAll();
    }
     public function getStudentsForm(){
       $this->select('enrollment.id as id, student.stud_num, student.firstname, student.middlename, student.lastname');
       $this->join('student', 'student.id = enrollment.student_id');
       $this->join('subjects  ', 'subjects.id = enrollment.subject_id');
       $this->join('course', 'student.course_id = course.id');
       $this->where('enrollment.status', 'i');
       return $this->findAll();
     }
     public function getSpecificStudentById($id){
       $this->select('subjects.subject, enrollment.required_hrs, enrollment.accumulated_hrs, enrollment.status, enrollment.id as enrollment_id, sum(penalty.hours) as penalty');
       $this->join('student', 'student.id = enrollment.student_id', 'left');
       $this->join('subjects  ', 'subjects.id = enrollment.subject_id', 'left');
       $this->join('course', 'student.course_id = course.id', 'left');
       $this->join('penalty', 'penalty.enrollment_id = enrollment.id', 'left');
       $this->where('student.id', $id);
       return $this->findAll();
     }

     public function addStudentEnroll($data){
      $data['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
      $data['status'] = 'i';
   	  return $this->save($data);
     }

     public function selectSpecificEnroll($stud_num){
       $this->select('enrollment.id as id, enrollment.stud_num, subjects.required_hrs, student.id as student_id, enrollment.accumulated_hrs as accumulated_hrs');
       $this->join('student', 'student.id = enrollment.student_id');
       $this->join('subjects', 'subjects.id = enrollment.subject_id');
       $this->where('enrollment.status', 'i');
       $this->where('enrollment.stud_num', $stud_num);
       return $this->findAll();
     }

     public function selectStudent($id){
       $this->where('student_id', $id);
       $this->where('status', 'i');
       return $this->first();
     }

     public function checkIfEnrolledNstp1($id){
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      $this->like('subjects.subject', '%NSTP1%');
      return $this->first();
    }

    public function checkIfCompleteNstp1($id){
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      $this->where('enrollment.status', 'c');
      $this->like('subjects.subject', '%NSTP1%');
      return $this->first();
    }

    public function checkIfEnrolledNstp2($id){
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      $this->like('subjects.subject', '%NSTP2%');
      return $this->first();
    }

    public function markCompleteNSTP1($id){
      $data = ['status' => 'c'];
      return $this->update(['id' => $id, 'subject_id' => '1'], $data);
   }
     public function markComplete($id){
       $data = ['status' => 'c'];
       return $this->update($id, $data);
    }

    public function deleteStudent($id)
  	{
		return $this->delete($id);
    }
    
    public function getAllEnrolled(){
      return $this->findAll();
    }

     
    public function getComplete(){
      $this->where('status', 'c');
      return $this->findAll();
    }

    public function getEnrolledById($id){
      $this->where('id', $id);
      return $this->first();
    }
    public function updateAccumulatedHours($val_array, $id){
      $data = ['accumulated_hrs' => $val_array];
      return $this->update($id, $data);
    }

    public function updateRequiredHours($val_array, $id){
      $data = ['required_hrs' => $val_array];
      return $this->update($id, $data);
    }

    public function getAllGraduates(){
      $this->join('student', 'student.id = enrollment.student_id','left');
      $this->join('subjects', 'subjects.id = enrollment.subject_id','left');
      $this->join('schyear', 'schyear.id = enrollment.schyear_id','left');
      $this->join('course', 'student.course_id = course.id','left');
      $this->where('enrollment.status', 'g');
      $this->orderBy('schyear.id ASC');
      $this->orderBy('course.id ASC');
      $this->orderBy('student.gender ASC');

      return $this->findAll();
    }

    public function getAllGraduatesByCourseSY($course_id,$schyear_id,$gender){

      $this->join('student', 'student.id = enrollment.student_id','left');
      $this->join('subjects', 'subjects.id = enrollment.subject_id','left');
      $this->join('schyear', 'schyear.id = enrollment.schyear_id','left');
      $this->join('course', 'student.course_id = course.id','left');
      $this->where('enrollment.status', 'g');
      // print_r($_POST);

      if($course_id !== 'all'){
        $this->where('course.id', $course_id);
      }

      if($schyear_id !== 'all'){
        $this->where('enrollment.schyear_id', $schyear_id);
      }
      
      if($gender !== 'all'){
        $this->where('student.gender', $gender);
      }
      $this->orderBy('student.gender ASC');
      $this->orderBy('schyear.id ASC');
      $this->orderBy('course.id ASC');

      return $this->findAll();
    }

    public function getAllSchedule($day, $time){
          // $this->where('end_time <=', $time);
          $this->where('start_time <=', $time);
          $this->where('day', $day);
          return $this->findAll();
    }

    public function getStudentSchedule($day, $student_id, $current_time){
      $this->where('student_id', $student_id);
      $this->where('end_time >=', $current_time);
      $this->where('start_time <=', $current_time);
      // $this->where('end_time >=','13:39:00');
      // $this->where('start_time <=',' 13:39:00');
      $this->where('day', $day);
      $this->where('status', 'i');
      return $this->first();
    }

    public function selectNstp1($id){
      $this->select('enrollment.id as id , enrollment.accumulated_hrs, enrollment.required_hrs');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      // $this->where('enrollment.status', 'i');
      $this->where('subjects.subject', 'NSTP1');
      return $this->first();
    }

    public function selectNstp2($id){
      $this->select('enrollment.id as id , enrollment.accumulated_hrs, enrollment.required_hrs, enrollment.status');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      // $this->where('enrollment.status', 'i');
      $this->where('subjects.subject', 'NSTP2');
      return $this->first();
    }

    public function getEnrolledByProfessorId($id){
      $this->select('enrollment.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject, enrollment.required_hrs,enrollment.accumulated_hrs');
      $this->join('student', 'student.id = enrollment.student_id');
      $this->join('subjects  ', 'subjects.id = enrollment.subject_id');
      $this->join('course', 'student.course_id = course.id');
      $this->where('enrollment.status', 'i');
      $this->where('professor_id', $id);
      return $this->findAll();
    }

    public function getEnrolledByProfessorByCourseYS($id,$course_id, $year,$section,$gender){
      $this->select('enrollment.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject,  enrollment.start_time, enrollment.end_time, enrollment.status,enrollment.day,enrollment.required_hrs,enrollment.accumulated_hrs');
      $this->join('student', 'student.id = enrollment.student_id');
      $this->join('subjects  ', 'subjects.id = enrollment.subject_id');
      $this->join('course', 'student.course_id = course.id');

      if($course_id !== 'all'){
        $this->where('student.course_id', $course_id);
      }

      if($year !== 'all'){
        $this->where('student.year_id', $year);
      }

      if($section !== 'all'){
        $this->where('student.section_id', $section);
      }

      if($gender !== 'all'){
        $this->where('student.gender', $gender);
      }
      $this->where('enrollment.status', 'i');
      $this->where('professor_id', $id);
      return $this->findAll();
    }
}
