<?php namespace App\Database\Migrations;

class CreateSchYear extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'schyear'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
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
                $this->forge->createTable('schyear');
        }

        public function down()
        {
                $this->forge->dropTable('schyear');
        }
}
