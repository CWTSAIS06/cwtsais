<?php
namespace Modules\StudentManagement\Models;

use CodeIgniter\Model;

class StudentModel extends \CodeIgniter\Model
{
     protected $table = 'student';

     protected $allowedFields = ['stud_num','user_id','serial_num','lastname','firstname','middlename','gender','contact_no','birthdate','age','address','course_id','year_id','section_id','schyear_id','section','guardian_name','guardian_contactnum','email','status', 'created_at','updated_at', 'deleted_at'];

    public function getStudentById($id){
      $this->select('student.id,student.course_id, student.firstname, student.lastname, student.middlename, course.course, student.address');
      $this->join('course', 'student.course_id = course.id');
      $this->where('student.id', $id);
      return $this->findAll();
    }

	public function getStudentWithFunction($args = [])
	{
		$db = \Config\Database::connect();

		//$str = "SELECT a.*, b.function_name FROM dentists a LEFT JOIN permissions b ON a.function_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];1
    $str = "SELECT * FROM student WHERE";
    $str .= " status = '" .$args['status'] ."'";
    if (isset($args['search'])) {
      $str .= "AND stud_num LIKE '%" . $args['search'] . "'";
    }
    $str .= " LIMIT ". $args['offset'] .','.$args['limit'];//without foreign key
		// print_r($str); die();
		$query = $db->query($str);

		// print_r($query->getResultArray()); die();
	    return $query->getResultArray();
	}
  public function getStudentWithCourse($args = [])
  {
    $db = \Config\Database::connect();
    $str = "SELECT a.*, b.course FROM student a LEFT JOIN course b ON a.course_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];
    $query = $db->query($str);

    // print_r($query->getResultArray()); die();
    return $query->getResultArray();
  }
  public function getStudentWithSchyear($args = [])
  {
    $db = \Config\Database::connect();

    $str = "SELECT a.*, b.schyear FROM student a LEFT JOIN schyear b ON a.schyear_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];
    //print_r($str); die();
    $query = $db->query($str);

    // print_r($query->getResultArray()); die();
      return $query->getResultArray();
  }

  public function getSpecificStudent($stud_num){

    $this->where('stud_num', $stud_num);

    return $this->findAll();
  }

    public function getStudent()
	{
      $this->select('student.*, course.course');
      // $this->join('schyear', 'schyear.id = student.schyear_id');
      $this->join('course', 'course.id = student.course_id');
      // $this->where('student.status', 'a');
	    return $this->findAll();
	}

    public function addStudent($val_array = [])
	{
		$val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
	  return $this->save($val_array);
	}

    public function editStudent($val_array, $id, $year_id, $section_id)
	{
    	
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		$val_array['contact_no'] = $val_array['contact_no'];
		$val_array['year_id'] = $year_id;
    $val_array['section_id'] = $section_id;
		return $this->update($id, $val_array);
	}

  public function editSerialNum($val_array, $id)
	{
    	
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

  public function inactiveStudent($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'd';
		return $this->update($id, $val_array);
  }
  public function activeStudent($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

  public function selectStudent($id){
    $this->select('id');
    $this->where('stud_num', $id);
    return $this->findAll();
  }

  public function addRegisteredStudent($val_array, $user_id){
		unset($val_array['username']);
    unset($val_array['password']);
    
    $val_array['user_id'] = $user_id;
    $val_array['status'] = 'a';
    $val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');

    return $this->save($val_array);
  }
  public function getStudentByUserId($id){
    $this->where('user_id', $id);
    return $this->first();
  }

  public function getAllStudents(){
    return $this->findAll();
  }

  public function getStudentByStudnum($stud_num){
    $this->where('stud_num', $stud_num);
    return $this->first();
  }
}
