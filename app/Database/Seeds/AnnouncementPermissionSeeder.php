<?php namespace App\Database\Seeds;

class AnnouncementPermissionSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'permissions';

        public function run()
        {
          $data = [
                [
                  'function_name' => 'show announcement details',
                  'function_description' => 'show announcement details',
                  'slugs' => 'show-announcement',
                  'name_on_class' => 'show_announcement',
                  'page_title' => 'announcement details',
                  'module_id' => '4',
                  'link_icon' => '',
                  'order' => '1',
                  'table_name' => 'announcement',
                  'func_action' => 'show',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'create announcement',
                  'function_description' => 'create announcement',
                  'slugs' => 'add-announcement',
                  'name_on_class' => 'add_announcement',
                  'page_title' => 'create a announcement',
                  'module_id' => '4',
                  'link_icon' => '',
                  'order' => '2',
                  'table_name' => 'announcement',
                  'func_action' => 'add',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'list of announcement',
                  'function_description' => 'list of announcement',
                  'slugs' => 'list-announcement',
                  'name_on_class' => 'index',
                  'page_title' => 'list of announcement',
                  'module_id' => '4',
                  'link_icon' => '<i class="far fa-circle"></i>',
                  'order' => '3',
                  'table_name' => 'announcement',
                  'func_action' => 'link',
                  'func_type' => 1,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'edit announcement',
                  'function_description' => 'edit announcement',
                  'slugs' => 'edit-announcement',
                  'name_on_class' => 'edit_announcement',
                  'page_title' => 'edit announcement',
                  'module_id' => '4',
                  'link_icon' => '',
                  'order' => '4',
                  'table_name' => 'announcement',
                  'func_action' => 'edit',
                  'func_type' => 3,
                  'allowed_roles' => "[1]",
                  'status' => 'a',
                  'created_at' => date('Y-m-d H:i:s')
                ],
                [
                  'function_name' => 'delete announcement',
                  'function_description' => 'delete announcement',
                  'slugs' => 'delete-announcement',
                  'name_on_class' => 'delete_announcement',
                  'page_title' => 'delete announcement',
                  'module_id' => '4',
                  'link_icon' => '',
                  'order' => '5',
                  'table_name' => 'announcement',
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
