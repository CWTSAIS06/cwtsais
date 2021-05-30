<?php
namespace Modules\Announcement\Models;

use CodeIgniter\Model;

class AnnouncementModel extends \CodeIgniter\Model
{
     protected $table = 'announcement';

     protected $allowedFields = ['announcement','description','announcement_date', 'status','created_at','updated_at', 'deleted_at'];

    public function getAnnouncementWithCondition($conditions = [])
	{
		foreach($conditions as $field => $value)
		{
			$this->where($field, $value);
		}
	    return $this->findAll();
	}

	public function getAnnouncnementWithFunction($args = [])
	{
		$db = \Config\Database::connect();

		//$str = "SELECT a.*, b.function_name FROM dentists a LEFT JOIN permissions b ON a.function_id = b.id WHERE a.status = '".$args['status']."' LIMIT ". $args['offset'] .','.$args['limit'];1
    $str = "SELECT * FROM announcement WHERE";
    $str .= " status = '" .$args['status'] ."'";
    if (isset($args['search'])) {
      $str .= "AND announcement LIKE '%" . $args['search'] . "'";
    }
    $str .= " LIMIT ". $args['offset'] .','.$args['limit'];//without foreign key
		// print_r($str); die();
		$query = $db->query($str);

		// print_r($query->getResultArray()); die();
	    return $query->getResultArray();
	}

    public function getAnnouncement()
	{
	    return $this->findAll();
	}

    public function addAnnouncement($val_array = [])
	{
		$val_array['created_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
	  return $this->save($val_array);
	}

    public function editAnnouncement($val_array = [], $id)
	{
		$val_array['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'a';
		return $this->update($id, $val_array);
	}

    public function deleteAnnouncement($id)
	{
		$val_array['deleted_at'] = (new \DateTime())->format('Y-m-d H:i:s');
		$val_array['status'] = 'd';
		return $this->update($id, $val_array);
	}
}
