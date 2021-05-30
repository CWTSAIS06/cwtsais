<?php namespace App\Database\Migrations;

class CreateCurrent extends \CodeIgniter\Database\Migration {

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

                        'subject'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '20',
                        ],
                        'status'       => [
                                'type'           => 'char',
                                'constraint'     => '1',
                                'default' => 'i'
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
                $this->forge->createTable('current');
        }

        public function down()
        {
                $this->forge->dropTable('current');
        }
}
