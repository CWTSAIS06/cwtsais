<?php
namespace Modules\PenaltyManagement\Models;

use CodeIgniter\Model;

class PenaltyModel extends \CodeIgniter\Model
{
     protected $table = 'penalty';

     protected $allowedFields = ['enrollment_id','date', 'hours','user_id','reason','other_reason','status','created_at','updated_at', 'deleted_at'];

    public function getPenaltyWithCondition($conditions = [])
	  {
      $this->select('penalty.id as id, student.firstname, student.middlename, student.lastname, subjects.subject, penalty.date, penalty.reason, penalty.other_reason, penalty.hours, penalties.penalty,penalty.status');
      foreach($conditions as $field => $value)
      {
        $this->where($field, $value);
      }
      $this->join('enrollment', 'enrollment.id = penalty.enrollment_id');
      $this->join('subjects', 'subjects.id = enrollment.subject_id');
      $this->join('student', 'student.id = enrollment.student_id');
      $this->join('penalties', 'penalties.id = penalty.reason','left');
	    return $this->findAll();
	}

    public function getPenalty()
  	{
	    return $this->findAll();
    }

    public function getSpecificPenalty($id)
    {
        $this->where('id', $id);
        return $this->first();
    }

    public function addPenalty($val_array = [])
	{
    $val_array['user_id'] = $_SESSION['uid'];
    $val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'a';
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
    $data['status'] = 'd';
		return $this->update($id,$data);
	}

  public function activePenalty($id)
	{
    $data['status'] = 'a';
		return $this->update($id,$data);
	}
  public function getPenaltyById($id){
    $this->select('enrollment.id as id, SUM(hours) as hours');
    $this->join('enrollment', 'enrollment.id = penalty.enrollment_id');
    $this->join('student', 'student.id = enrollment.student_id');
    $this->where('student.id', $id);
    $this->groupBy('enrollment.id');
    return $this->findAll();
  }
  public function getPenaltyByEnrollId($id){
    $this->select('enrollment.id as id, SUM(hours) as hours');
    $this->join('enrollment', 'enrollment.id = penalty.enrollment_id');
    $this->join('student', 'student.id = enrollment.student_id');
    $this->where('enrollment.id', $id);
    return $this->findAll();
  }

  public function getPenaltyByEnrolled($id){
    // $this->select('enrollment.id as id, SUM(hours) as hours');
    // $this->select('student.stud_num');
    $this->join('enrollment', 'enrollment.id = penalty.enrollment_id');
    // $this->join('student', 'student.id = enrollment.student_id');
    $this->where('enrollment.id', $id);
    return $this->findAll();
  }
}
