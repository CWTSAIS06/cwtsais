<?php namespace App\Database\Seeds;

class SubjectSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'subjects';

        public function run()
        {
          $data = [
                [
                  'code' => 'NSTP1',
                  'subject' => 'NSTP1',
                  'status' => 'a',
                  'created_date' => date('Y-m-d H:i:s')
                ],
                [
                  'code' => 'NSTP2',
                  'subject' => 'NSTP2',
                  'status' => 'a',
                  'created_date' => date('Y-m-d H:i:s')
                ],
                ];
                //print_r($data); die();
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }
}
