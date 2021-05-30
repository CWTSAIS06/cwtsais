<?php namespace App\Database\Migrations;

class CreatePenalty extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'current_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],

                        'date'       => [
                                'type'           => 'DATE',
                        ],

                        'hours'       => [
                                'type'           => 'INT',
                        ],

                        'user_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '20',
                        ],
                        'reason'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '100',
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
                $this->forge->createTable('penalty');
        }

        public function down()
        {
                $this->forge->dropTable('penalty');
        }
}
