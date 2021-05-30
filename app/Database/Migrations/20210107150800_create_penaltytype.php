<?php namespace App\Database\Migrations;

class CreatePenaltyType extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],
                        'penalty_type'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'hours'       => [
                                'type'           => 'TIME',
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
                $this->forge->createTable('penalty_type');
        }

        public function down()
        {
                $this->forge->dropTable('penalty_type');
        }
}
