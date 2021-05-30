<?php namespace App\Database\Seeds;

class PenaltyPermissionSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'permissions';

        public function run()
        {
          $data = [
                [
                  'function_name' => 'create penalty',
                  'function_description' => 'create penalty',
                  'slugs' => 'add-penalty',
                  'name_on_class' => 'add_penalty',
                  'page_title' => 'create a penalty',
                  'module_id' => '2',
                  'link_icon' => '',
                  'order' => '1',
                  'table_name' => 'penalty',
                  'func_action' => 'add',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'list of penalty',
                  'function_description' => 'list of penalty',
                  'slugs' => 'list-penalty',
                  'name_on_class' => 'index',
                  'page_title' => 'list of penalty',
                  'module_id' => '2',
                  'link_icon' => '<i class="far fa-circle"></i>',
                  'order' => '2',
                  'table_name' => 'penalty',
                  'func_action' => 'link',
                  'func_type' => 1,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'edit penalty',
                  'function_description' => 'edit penalty',
                  'slugs' => 'edit-penalty',
                  'name_on_class' => 'edit_penalty',
                  'page_title' => 'edit penalty',
                  'module_id' => '2',
                  'link_icon' => '',
                  'order' => '3',
                  'table_name' => 'penalty',
                  'func_action' => 'edit',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'delete penalty',
                  'function_description' => 'delete penalty',
                  'slugs' => 'delete-penalty',
                  'name_on_class' => 'delete_penalty',
                  'page_title' => 'delete penalty',
                  'module_id' => '2',
                  'link_icon' => '',
                  'order' => '4',
                  'table_name' => 'penalty',
                  'func_action' => 'delete',
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
