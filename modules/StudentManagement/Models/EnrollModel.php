<?php
namespace Modules\StudentManagement\Models;

use CodeIgniter\Model;

class EnrollModel extends \CodeIgniter\Model
{
     protected $table = 'current';

     protected $allowedFields = ['id','stud_id','subject','status','created_at','deleted_at','updated_at'];

     public function getSpecificStudent($stud_num){

       $this->where('stud_num', $stud_num);

       return $this->findAll();
     }

     public function getStudents(){
       $this->select('current.id, student.firstname, student.lastname, student.middlename, student.stud_num, course.course, subjects.subject');
       $this->join('student', 'student.id = current.stud_id');
       $this->join('subjects  ', 'subjects.id = current.subject');
       $this->join('course', 'student.course_id = course.id');
       $this->where('current.status', 'i');
       return $this->findAll();
     }
     public function getStudentsForm(){
       $this->select('current.id as id, student.stud_num, student.firstname, student.middlename, student.lastname');
       $this->join('student', 'student.id = current.stud_id');
       $this->join('subjects  ', 'subjects.id = current.subject');
       $this->join('course', 'student.course_id = course.id');
       $this->where('current.status', 'i');
       return $this->findAll();
     }
     public function getSpecificStudentById($id){
       $this->select('subjects.subject, subjects.required_hrs, current.status, current.id as current_id');
       $this->join('student', 'student.id = current.stud_id');
       $this->join('subjects  ', 'subjects.id = current.subject');
       $this->join('course', 'student.course_id = course.id');
       $this->where('student.id', $id);
       return $this->findAll();
     }

     public function addStudentEnroll($data){
      $data['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
   	  return $this->save($data);
     }

     public function selectSpecificEnroll($data){
       $this->select('current.id as id, subjects.required_hrs, student.id as stud_id');
       $this->join('student', 'student.id = current.stud_id');
       $this->join('subjects', 'subjects.id = current.subject');
       $this->where('current.status', 'i');
       $this->where('stud_num', $data);
       return $this->findAll();
     }

     public function selectStudent($id){
       $this->select('student.id as student_id');
       $this->join('student', 'student.id = current.stud_id');
       $this->where('student.stud_num', $id);
       $this->where('current.status', 'i');
       return $this->findAll();
     }

     public function markComplete($id){
       $data = ['status' => 'c'];
       return $this->update($id, $data);
    }

    public function deleteStudent($id)
  	{
		return $this->delete($id);
	  }
}
