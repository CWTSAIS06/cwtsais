<?php namespace App\Database\Migrations;

class CreateAttendance extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'enroll_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],
                        'date'       => [
                                'type'           => 'DATE',
                        ],

                        'timein'       => [
                                'type'           => 'TIME',
                        ],

                        'timeout'       => [
                                'type'           => 'TIME',
                                'default'        => null,
                        ],

                        'user_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],


                        'status'                 => [
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
                $this->forge->createTable('attendance');
        }

        public function down()
        {
                $this->forge->dropTable('attendance');
        }
}
