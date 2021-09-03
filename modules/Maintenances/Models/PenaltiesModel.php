<?php
namespace Modules\Maintenances\Models;
use CodeIgniter\Model;

class PenaltiesModel extends \CodeIgniter\Model
{
    protected $table = 'penalties';

    protected $allowedFields = ['id','penalty','hours','status', 'created_date','updated_date', 'deleted_date'];

    public function getPenaltyWithCondition($conditions = [])
    {
    foreach($conditions as $field => $value)
    {
      $this->where($field, $value);
    }
      return $this->findAll();
    }

    public function getPenalty(){

    $db = \Config\Database::connect();

    $str = "SELECT p.* FROM penalties p order by p.created_date desc";

    $query = $db->query($str);

    return $query->getResultArray();
    }

        public function add_maintenance($val_array = [])
      {
        $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
        $val_array['status'] = 'a';
        return $this->save($val_array);
      }
      public function edit_maintenance($val_array = [], $id)
      {
        $val_array['updated_date'] = (new \DateTime())->format('Y-m-d H:i:s');
        return $this->update($id, $val_array);
      }

      public function inactive_status($id)
      {
        $val_array['deleted_date'] = (new \DateTime())->format('Y-m-d H:i:s');
        $val_array['status'] = 'd';

        return $this->update($id, $val_array);
      }

      public function active_status($id)
      {
        $val_array['deleted_date'] = (new \DateTime())->format('Y-m-d H:i:s');
        $val_array['status'] = 'a';

        return $this->update($id, $val_array);
      }
}
