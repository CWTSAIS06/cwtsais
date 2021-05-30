<?php namespace App\Database\Migrations;

class CreateStudentTime extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'stud_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],

                        'attendance_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],

                        'penalty_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],

                        'subject'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '20',
                        ],

                        'finalhrs'       => [
                                'type'           => 'INT',
                                'constraint'     => '3',
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
                $this->forge->createTable('student_time');
        }

        public function down()
        {
                $this->forge->dropTable('student_time');
        }
}
