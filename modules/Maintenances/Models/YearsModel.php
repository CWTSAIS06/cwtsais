<?php
namespace Modules\Maintenances\Models;

use CodeIgniter\Model;

class YearsModel extends \CodeIgniter\Model
{
    protected $table = 'years';

    protected $allowedFields = ['id','course_id','year','status', 'created_date','updated_date', 'deleted_date'];


        public function getYearWithCondition($conditions = [])
        {
          foreach($conditions as $field => $value)
          {
            $this->where($field, $value);
          }
          return $this->findAll();
        }

      public function getYear(){
        // $this->select('c.id,c.course,years.course_id as course_id, s.id as id, years.status, s.section, years.year');
        $this->join('sections s', 's.year_id = years.id', 'LEFT');
        // $this->join('course c', 'c.id = years.course_id', 'LEFT');
        // $this->where('years.status', 'a');
        return $this->findAll();
        
      }

      public function getYearAndSectionByCourse($id){
        $this->select('years.*,years.id as year_id, s.*');
        $this->join('sections s', 's.year_id = years.id', 'inner');
        $this->where('years.status', 'a');
        $this->where('s.status', 'a');
        $this->where('s.course_id', $id);


        return $this->findAll();
        
      }

      public function getYearAndSection(){
        // $this->select('years.*,c.id, s.*');
        $this->join('course c', 'years.course_id = c.id', 'INNER');
        $this->join('sections s', 's.year_id = years.id', 'left');
        $this->where('years.status', 'a');
        $this->where('s.status', 'a');
        return $this->findAll();
      }

      public function getYearAndSectionById($id){
        // $this->select('years.*,c.id, s.*');
        $this->join('course c', 'years.course_id = c.id', 'inner');
        $this->join('sections s', 's.year_id = years.id', 'left');
        $this->where('years.status', 'a');
        $this->where('s.status', 'a');
        $this->where('years.id', $id);
        $this->where('s.year_id', $id);

        return $this->first();
      }
  
      public function add_maintenance($val_array = [])
      {
        $db = \Config\Database::connect();
        unset($val_array['section']);

        $year = $val_array['year'];
        $course_id = $val_array['course_id'];

        $str = "SELECT p.* FROM years p WHERE p.status = 'a' AND p.year = '$year' AND p.course_id = '$course_id'";
        $query = $db->query($str)->getResultArray();

        if(!empty($query))
        {
          return $this->update(['course_id' => $course_id, 'year' => $year], $val_array);
        }else{

          $val_array['created_date'] = (new \DateTime())->format('Y-m-d H:i:s');
          $val_array['status'] = 'a';
          return $this->save($val_array);
        }
      
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
