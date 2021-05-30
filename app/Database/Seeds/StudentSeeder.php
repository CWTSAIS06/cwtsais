<?php namespace App\Database\Seeds;

class UsersSeeder extends \CodeIgniter\Database\Seeder
{
        public $table = 'users';

        public function run()
        {
                $data = [
                    [
                        'username' => 'superadmin',
                        'password' => password_hash('superadmin', PASSWORD_DEFAULT),
                        'role_id' => 1,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'username' => 'admin',
                        'password' => password_hash('admin', PASSWORD_DEFAULT),
                        'role_id' => 2,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                    [
                        'username' => 'DocNelson',
                        'password' => password_hash('dokie123', PASSWORD_DEFAULT),
                        'role_id' => 1,
                        'status' => 'a',
                        'created_at' => date('Y-m-d H:i:s')
                    ],
                ];
                $db      = \Config\Database::connect();
                $builder = $db->table($this->table);
                $builder->insertBatch($data);
        }
}
