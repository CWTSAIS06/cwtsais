<?php namespace App\Database\Seeds;

class RolesSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'roles';

        public function run()
        {
                $data = [
                    [
                        'role_name' => 'Super Administrator',
                        'function_id' => 1,
                        'description' => 'Super Administrator',
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'role_name' => 'user',
                        'function_id' => 1,
                        'description' => 'user',
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                ];
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }
}
