<?php
namespace Modules\TableManagement\Models;

use CodeIgniter\Model;

class CourseModel extends \CodeIgniter\Model
{
     protected $table = 'course';

     protected $allowedFields = ['course','description', 'status','created_at','updated_at', 'deleted_at'];

    public function getCourseWithCondition($conditions = [])
	{
		foreach($conditions as $field => $value)
		{
			$this->where($field, $value);
		}
	    return $this->findAll();
	}

	public function getCourseWithFunction($args = [])
	{
		$db = \Config\Database::connect();

		//$str = "SELECT a.*, b.function_name FROM dentists a LEFT JOIN permissions b ON a.function_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];1
    $str = "SELECT * FROM course";
    // $str .= " status = '" .$args['status'] ."'";
    if (isset($args['search'])) {
      $str .= "WHERE course LIKE '%" . $args['search'] . "'";
    }
    $str .= " LIMIT ". $args['offset'] .','.$args['limit'];//without foreign key
		// print_r($str); die();
		$query = $db->query($str);

		// print_r($query->getResultArray()); die();
	    return $query->getResultArray();
	}

    public function getCourse()
	{
		$this->where('status','a');
	    return $this->findAll();
	}

    public function addCourse($val_array = [])
	{
		$val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
	  return $this->save($val_array);
	}

    public function editCourse($val_array = [], $id)
	{
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

	public function getCourseById($id){
		$this->where('id', $id);
		return $this->first();
	}

	public function getCourseByName($course){
		$this->like('course', '%'.$course.'%');
		return $this->first();
	}


    public function inactiveCourse($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'd';
		return $this->update($id, $val_array);
	}

	public function activeCourse($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}
}
