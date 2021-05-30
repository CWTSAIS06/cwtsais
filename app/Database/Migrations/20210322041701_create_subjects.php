<?php namespace App\Database\Migrations;

class CreateSubjects extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'code'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'subject'       => [
                                'type'           => 'VARCHAR',
                                'constraint' => '50',
                        ],
                        'required_hrs' => [
                                'type'           => 'int',
                                'constraint'     => '3',
                                'default'        => '80'
                        ],
                        'status' => [
                                'type'           => 'CHAR',
                                'constraint'     => '1',
                                'default'        => 'a'
                        ],

                        'created_date' => [
                                'type'           => 'DATETIME',
                                'comment'        => 'Date of creation',
                        ],

                        'updated_date' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date last updated',
                        ],
                        'deleted_date' => [
                                'type'           => 'DATETIME',
                                'null'           => true,
                                'default'        => null,
                                'comment'        => 'Date of soft deletion',
                        ]
                ]);
                $this->forge->addKey('id', TRUE);
                $this->forge->createTable('subjects');
        }

        public function down()
        {
                $this->forge->dropTable('subjects');
        }
}
