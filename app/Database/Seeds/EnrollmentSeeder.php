<?php namespace App\Database\Seeds;

class EnrollmentSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'permissions';

        public function run()
        {
          $data = [
                [
                  'function_name' => 'Enroll Student',
                  'function_description' => 'enroll student',
                  'slugs' => 'enroll-student',
                  'name_on_class' => 'enroll_student',
                  'page_title' => 'enroll_student',
                  'module_id' => '5',
                  'link_icon' => '',
                  'order' => '43',
                  'table_name' => 'enroll',
                  'func_action' => 'add',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'list of enroll student',
                  'function_description' => 'list of enroll student',
                  'slugs' => 'list-enroll-student',
                  'name_on_class' => 'index',
                  'page_title' => 'list of enroll student',
                  'module_id' => '5',
                  'link_icon' => '<i class="far fa-circle"></i>',
                  'order' => '44',
                  'table_name' => 'enroll',
                  'func_action' => 'link',
                  'func_type' => 1,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'delete enroll student',
                  'function_description' => 'delete enroll student',
                  'slugs' => 'delete-enroll-student',
                  'name_on_class' => 'delete_enroll_student',
                  'page_title' => 'delete enroll student',
                  'module_id' => '5',
                  'link_icon' => '',
                  'order' => '45',
                  'table_name' => 'enroll',
                  'func_action' => 'delete',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ]
                ];
                //print_r($data); die();
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }
}
