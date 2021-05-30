<?php namespace App\Database\Migrations;

class CreateCourses extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'course'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'description'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
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
                $this->forge->createTable('course');
        }

        public function down()
        {
                $this->forge->dropTable('course');
        }
}
