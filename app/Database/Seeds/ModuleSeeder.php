<?php namespace App\Database\Seeds;

class ModuleSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'modules';

        public function run()
        {
                $data = [
                    [
                        'module_name' => 'user management',
                        'module_description' => 'user management',
                        'module_icon' => '<i class="fas fa-users-cog"></i>',
                        'order' => 1,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'module_name' => 'penalty management',
                        'module_description' => 'penalty management',
                        'module_icon' => '<i class="fas fa-users-cog"></i>',//change font-awesome related to the topic
                        'order' => 2,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'module_name' => 'table management',
                        'module_description' => 'table management',
                        'module_icon' => '<i class="fas fa-users-cog"></i>',//change font-awesome related to the topic
                        'order' => 3,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'module_name' => 'announcement',
                        'module_description' => 'announcement',
                        'module_icon' => '<i class="fas fa-bullhorn"></i>',//change font-awesome related to the topic
                        'order' => 4,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'module_name' => 'student management',
                        'module_description' => 'student management',
                        'module_icon' => '<i class="fas fa-users-cog"></i>',//change font-awesome related to the topic
                        'order' => 5,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'module_name' => 'attendance management',
                        'module_description' => 'attendance management',
                        'module_icon' => '<i class="fas fa-users-cog"></i>',//change font-awesome related to the topic
                        'order' => 6,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'module_name' => 'maintenances',
                        'module_description' => 'maintenances',
                        'module_icon' => '<i class="fas fa-users-cog"></i>',//change font-awesome related to the topic
                        'order' => 7,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                ];
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }
}
