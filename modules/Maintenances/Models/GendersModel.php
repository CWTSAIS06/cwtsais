<?php
namespace Modules\Maintenances\Models;
use CodeIgniter\Model;

class GendersModel  extends \CodeIgniter\Model
{
    protected $table = 'genders';

    protected $allowedFields = ['id','user_id','gender','status', 'created_date','updated_date', 'deleted_date'];

    public function getGenderWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }

        public function getGender(){

        $db = \Config\Database::connect();

        $str = "SELECT p.* FROM genders p WHERE p.status = 'a' order by p.created_date desc";

        $query = $db->query($str);

        return $query->getResultArray();
        }
    public function add_maintenance($val_array = [])
  {
    $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    return $this->save($val_array);
  }
  public function edit_maintenance($val_array = [], $id)
  {
    $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    return $this->update($id, $val_array);
  }

  public function delete_maintenance($id)
  {
    $val_array['deleted_date'] = (new \DateTime())->format('Y-m-d H:i:s');
    $val_array['status'] = 'd';

    return $this->update($id, $val_array);
  }
}
