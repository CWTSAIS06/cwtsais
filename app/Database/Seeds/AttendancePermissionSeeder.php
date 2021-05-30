<?php namespace App\Database\Seeds;

class AttendancePermissionSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'permissions';

        public function run()
        {
          $data = [
                [
                  'function_name' => 'show attendance details',
                  'function_description' => 'show attendance details',
                  'slugs' => 'show-attendance',
                  'name_on_class' => 'show_attendance',
                  'page_title' => 'attendance details',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '1',
                  'table_name' => 'attendance',
                  'func_action' => 'show',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'create attendance',
                  'function_description' => 'create attendance',
                  'slugs' => 'add-attendance',
                  'name_on_class' => 'add_attendance',
                  'page_title' => 'create a attendance',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '2',
                  'table_name' => 'attendance',
                  'func_action' => 'add',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'list of attendance',
                  'function_description' => 'list of attendance',
                  'slugs' => 'list-attendance',
                  'name_on_class' => 'index',
                  'page_title' => 'list of attendance',
                  'module_id' => '6',
                  'link_icon' => '<i class="far fa-circle"></i>',
                  'order' => '3',
                  'table_name' => 'attendance',
                  'func_action' => 'link',
                  'func_type' => 1,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'edit attendance',
                  'function_description' => 'edit attendance',
                  'slugs' => 'edit-attendance',
                  'name_on_class' => 'edit_attendance',
                  'page_title' => 'edit attendance',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '4',
                  'table_name' => 'attendance',
                  'func_action' => 'edit',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'delete attendance',
                  'function_description' => 'delete attendance',
                  'slugs' => 'delete-attendance',
                  'name_on_class' => 'delete_attendance',
                  'page_title' => 'delete attendance',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '5',
                  'table_name' => 'attendance',
                  'func_action' => 'delete',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'verify attendance',
                  'function_description' => 'verify attendance',
                  'slugs' => 'verify-attendance',
                  'name_on_class' => 'verify_attendance',
                  'page_title' => 'verify attendance',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '6',
                  'table_name' => 'attendance',
                  'func_action' => 'verify',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'attendance',
                  'function_description' => 'attendance',
                  'slugs' => 'attendance',
                  'name_on_class' => 'attendance',
                  'page_title' => 'attendance',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '7',
                  'table_name' => 'attendance',
                  'func_action' => 'attendance',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'timeout',
                  'function_description' => 'timeout',
                  'slugs' => 'timeout',
                  'name_on_class' => 'timeout',
                  'page_title' => 'timeout',
                  'module_id' => '6',
                  'link_icon' => '',
                  'order' => '8',
                  'table_name' => 'attendance',
                  'func_action' => 'timeout',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
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
