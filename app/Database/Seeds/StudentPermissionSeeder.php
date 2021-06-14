<?php namespace App\Database\Seeds;

class StudentPermissionSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'permissions';

        public function run()
        {
          $data = [
                [
                  'function_name' => 'show student details',
                  'function_description' => 'show student details',
                  'slugs' => 'show-student',
                  'name_on_class' => 'show_student',
                  'page_title' => 'student details',
                  'module_id' => '5',
                  'link_icon' => '',
                  'order' => '1',
                  'table_name' => 'student',
                  'func_action' => 'show',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'create student',
                  'function_description' => 'create student',
                  'slugs' => 'add-student',
                  'name_on_class' => 'add_student',
                  'page_title' => 'create a student',
                  'module_id' => '5',
                  'link_icon' => '',
                  'order' => '2',
                  'table_name' => 'student',
                  'func_action' => 'add',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'list of student',
                  'function_description' => 'list of student',
                  'slugs' => 'list-student',
                  'name_on_class' => 'index',
                  'page_title' => 'list of student',
                  'module_id' => '5',
                  'link_icon' => '<i class="far fa-circle"></i>',
                  'order' => '3',
                  'table_name' => 'student',
                  'func_action' => 'link',
                  'func_type' => 1,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'edit student',
                  'function_description' => 'edit student',
                  'slugs' => 'edit-student',
                  'name_on_class' => 'edit_student',
                  'page_title' => 'edit student',
                  'module_id' => '5',
                  'link_icon' => '',
                  'order' => '4',
                  'table_name' => 'student',
                  'func_action' => 'edit',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'delete student',
                  'function_description' => 'delete student',
                  'slugs' => 'delete-student',
                  'name_on_class' => 'delete_student',
                  'page_title' => 'delete student',
                  'module_id' => '5',
                  'link_icon' => '',
                  'order' => '5',
                  'table_name' => 'student',
                  'func_action' => 'delete',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'profile student details',
                  'function_description' => 'profile student details',
                  'slugs' => 'profile-student',
                  'name_on_class' => 'profile_student',
                  'page_title' => 'profile student details',
                  'module_id' => '5',
                  'link_icon' => '<i class="far fa-circle"></i>',
                  'order' => '6',
                  'table_name' => 'student',
                  'func_action' => 'link',
                  'func_type' => 1,
                  'allowed_roles' => "[3]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                ];
                //print_r($data); die();
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }
}
