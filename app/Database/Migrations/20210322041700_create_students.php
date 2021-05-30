<?php namespace App\Database\Migrations;

class CreateStudents extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'stud_num'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'serial_num'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '50',
                        ],

                        'lastname'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '50',
                        ],

                        'firstname'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '50',
                        ],

                        'middlename'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '50',
                        ],

                        'gender'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '20',
                                // 'comment' => '1 Male, 2 Female',
                        ],

                        'contactnum'       => [
                                'type'           => 'INT',
                                'constraint' => '13',
                        ],

                        'birthdate'       => [
                                'type'           => 'DATE',
                        ],

                        'age'       => [
                                'type'           => 'INT',
                                'constraint' => '2',
                        ],

                        'address'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '250',
                        ],

                        'course_id'       => [
                                'type'           => 'INT',
                                'constraint' => '20',
                        ],
                        'schyear_id'       => [
                                'type'           => 'INT',
                                'constraint' => '20',
                        ],

                        'section'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '20',
                        ],

                        'guardian_name'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '255',
                        ],

                        'guardian_contactnum'       => [
                                'type'           => 'INT',
                                'constraint' => '13',
                        ],

                        'guardian_name'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '255',
                        ],

                        'email'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '50',
                        ],

                        'status' => [
                                'type'           => 'CHAR',
                                'constraint'     => '1',
                                'default'        => 'a'
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
                $this->forge->createTable('student');
        }

        public function down()
        {
                $this->forge->dropTable('student');
        }
}
