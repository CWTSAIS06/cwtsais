<?php
namespace Modules\PenaltyManagement\Models;

use CodeIgniter\Model;

class PenaltyModel extends \CodeIgniter\Model
{
     protected $table = 'penalty';

     protected $allowedFields = ['current_id','date', 'hours','user_id','reason','created_at','updated_at', 'deleted_at'];

    public function getPenaltyWithCondition($conditions = [])
	{
    $this->select('penalty.id as id, student.firstname, student.middlename, student.lastname, subjects.subject, penalty.date, penalty.reason, penalty.hours');
		foreach($conditions as $field => $value)
		{
			$this->where($field, $value);
		}
      $this->join('current', 'current.id = penalty.current_id');
      $this->join('subjects', 'subjects.id = current.subject');
      $this->join('student', 'student.id = current.stud_id');
	    return $this->findAll();
	}

    public function getPenalty()
	{
	    return $this->findAll();
	}

    public function addPenalty($val_array = [])
	{
    $val_array['user_id'] = $_SESSION['uid'];
		$val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
	  return $this->save($val_array);
	}

    public function editPenalty($val_array = [], $id)
	{
    $val_array['user_id'] = $_SESSION['uid'];
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		return $this->update($id, $val_array);
	}

    public function deletePenalty($id)
	{
		return $this->delete(['id' => $id]);
	}

  public function getPenaltyById($id){
    $this->select('current.id as id, SUM(hours) as hours');
    $this->join('current', 'current.id = penalty.current_id');
    $this->join('student', 'student.id = current.stud_id');
    $this->where('student.id', $id);
    $this->groupBy('current.id');
    return $this->findAll();
  }
  public function getPenaltyByEnrollId($id){
    $this->select('current.id as id, SUM(hours) as hours');
    $this->join('current', 'current.id = penalty.current_id');
    $this->join('student', 'student.id = current.stud_id');
    $this->where('current.id', $id);
    return $this->findAll();
  }
}
