<?php
namespace Modules\TableManagement\Models;

use CodeIgniter\Model;

class SubjectModel extends \CodeIgniter\Model
{
     protected $table = 'subjects';

     protected $allowedFields = ['code','subject','required_hrs', 'status','created_at','updated_at', 'deleted_at'];

    public function getSubjectWithCondition($conditions = [])
	{
		foreach($conditions as $field => $value)
		{
			$this->where($field, $value);
		}
	    return $this->findAll();
	}

	public function getSubjectWithFunction($args = [])
	{
		$db = \Config\Database::connect();

		//$str = "SELECT a.*, b.function_name FROM dentists a LEFT JOIN permissions b ON a.function_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];1
    $str = "SELECT * FROM subject WHERE";
    $str .= " status = '" .$args['status'] ."'";
    if (isset($args['search'])) {
      $str .= "AND subjects LIKE '%" . $args['search'] . "'";
    }
    $str .= " LIMIT ". $args['offset'] .','.$args['limit'];//without foreign key
		// print_r($str); die();
		$query = $db->query($str);

		// print_r($query->getResultArray()); die();
	    return $query->getResultArray();
	}

    public function getSubject()
	{
	    return $this->findAll();
	}

	public function getSubjectByName($subject)
	{
		$this->like('code', '%'.$subject.'%');
	    return $this->first();
	}

    public function addSubject($val_array = [])
	{
		$val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
	  return $this->save($val_array);
	}

    public function editSubject($val_array = [], $id)
	{
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

    public function deleteSubject($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'd';
		return $this->update($id, $val_array);
	}
}
