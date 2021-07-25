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

     public function getStudentsByCourseYS($course_id, $year,$section){
      $this->select('enrollment.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject, enrollment.required_hrs,enrollment.accumulated_hrs');
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

      // $this->where('enrollment.status', 'i');
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
       $this->select('subjects.subject, subjects.required_hrs, enrollment.status, enrollment.id as enrollment_id');
       $this->join('student', 'student.id = enrollment.student_id');
       $this->join('subjects  ', 'subjects.id = enrollment.subject_id');
       $this->join('course', 'student.course_id = course.id');
       $this->where('student.id', $id);
       return $this->findAll();
     }

     public function addStudentEnroll($data){
      $data['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
      $data['status'] = 'i';
   	  return $this->save($data);
     }

     public function selectSpecificEnroll($data){
       $this->select('enrollment.id as id, subjects.required_hrs, student.id as student_id, enrollment.accumulated_hrs as accumulated_hrs');
       $this->join('student', 'student.id = enrollment.student_id');
       $this->join('subjects', 'subjects.id = enrollment.subject_id');
       $this->where('enrollment.status', 'i');
       $this->where('enrollment.stud_num', $data);
       return $this->findAll();
     }

     public function selectStudent($id){
       $this->where('student_id', $id);
       $this->where('status', 'i');
       return $this->first();
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
      $this->join('student', 'student.id = enrollment.student_id');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->join('schyear', 'schyear.id = enrollment.schyear_id');
      $this->join('course', 'student.course_id = course.id');
      $this->where('enrollment.status', 'c');
      $this->orderBy('schyear.id ASC');
      $this->orderBy('course.id ASC');
      $this->orderBy('student.gender ASC');

      return $this->findAll();
    }

    public function getAllGraduatesByCourseSY($course_id,$schyear_id){

      $this->join('student', 'student.id = enrollment.student_id');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->join('schyear', 'schyear.id = enrollment.schyear_id');
      $this->join('course', 'student.course_id = course.id');
      $this->where('enrollment.status', 'c');

      if($course_id !== 'all'){
        $this->where('course.id', $course_id);
      }

      if($schyear_id !== 'all'){
        $this->where('enrollment.schyear_id', $schyear_id);
      }
      $this->orderBy('schyear.id ASC');
      $this->orderBy('course.id ASC');
      $this->orderBy('student.gender ASC');

      return $this->findAll();
    }

    public function getAllSchedule($day, $time){
          $this->where('day', $day);
          $this->where('start_time <=', $time);
          $this->where('end_time >=', $time);
          return $this->findAll();
    }

    public function getStudentSchedule($day, $student_id, $current_time){
      $this->where('student_id', $student_id);
      $this->where('end_time >=', $current_time);
      $this->where('start_time <=', $current_time);
      // $this->where('end_time >=','13:39:00');
      // $this->where('start_time <=',' 13:39:00');
      $this->where('day',$day);
      $this->where('status', 'i');
      return $this->first();
    }

    public function selectNstp1($id){
      $this->select('enrollment.id as id , enrollment.accumulated_hrs, enrollment.required_hrs');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      $this->where('enrollment.status', 'i');
      $this->where('subjects.subject', 'NSTP1');
      return $this->first();
    }

    public function selectNstp2($id){
      $this->select('enrollment.id as id , enrollment.accumulated_hrs, enrollment.required_hrs');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->where('enrollment.student_id', $id);
      $this->where('enrollment.status', 'i');
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

    public function getEnrolledByProfessorByCourseYS($id,$course_id, $year,$section){
      $this->select('enrollment.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject, enrollment.required_hrs,enrollment.accumulated_hrs');
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
      $this->where('enrollment.status', 'i');
      $this->where('professor_id', $id);
      return $this->findAll();
    }
}
