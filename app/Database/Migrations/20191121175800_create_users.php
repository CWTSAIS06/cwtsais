<?php namespace App\Database\Migrations;

class CreateUsers extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'username'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'firstname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'lastname'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'email'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],
                        'password'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '60',
                        ],
                        'role_id'       => [
                                'type'           => 'INT',
                                'default'        => 2
                        ],
                        'status' => [
                                'type'           => 'CHAR',
                                'constraint'     => '1',
                                'default'        => 'a'
                        ],
                        'birthdate' => [
                                'type'           => 'DATE',
                        ],
                        'created_at' => [
                                'type'           => 'DATETIME',
                                'comment'        => 'Date of creation',
                        ],

                        'updated_at' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date last updated',
                        ],
                        'deleted_at' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date of soft deletion',
                        ]
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('users');
        }

        public function down()
        {
                $this->forge->dropTable('users');
        }
}
