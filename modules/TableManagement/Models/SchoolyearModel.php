<?php
namespace Modules\TableManagement\Models;

use CodeIgniter\Model;

class SchoolyearModel extends \CodeIgniter\Model
{
     protected $table = 'schyear';

     protected $allowedFields = ['schyear','status','created_at','updated_at', 'deleted_at'];

    public function getSchoolyearWithCondition($conditions = [])
	{
		foreach($conditions as $field => $value)
		{
			$this->where($field, $value);
		}
	    return $this->findAll();
	}

	public function getSchoolyearWithFunction($args = [])
	{
		$db = \Config\Database::connect();

		//$str = "SELECT a.*, b.function_name FROM dentists a LEFT JOIN permissions b ON a.function_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];1
    $str = "SELECT * FROM schyear";
    // $str .= " status = '" .$args['status'] ."'";
    if (isset($args['search'])) {
      $str .= "WHERE schyear LIKE '%" . $args['search'] . "'";
    }
    $str .= " LIMIT ". $args['offset'] .','.$args['limit'];//without foreign key
		// print_r($str); die();
		$query = $db->query($str);

		// print_r($query->getResultArray()); die();
	    return $query->getResultArray();
	}

    public function getSchoolyear()
	{
		$this->where('status', 'a');
	    return $this->findAll();
	}

    public function addSchoolyear($val_array = [])
	{
		$val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
	  return $this->save($val_array);
	}

    public function editSchoolyear($val_array = [], $id)
	{
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

    public function inactiveSchoolyear($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'd';
		return $this->update($id, $val_array);
	}
	public function activeSchoolyear($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

	public function getCurrentSchoolYear($date){
		$this->like("schyear", "%".$date."%");
		// $this->where('status', 'a');
		return $this->first();
	}



}
