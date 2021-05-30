<?php namespace App\Database\Migrations;

class CreateAnnouncement extends \CodeIgniter\Database\Migration {

        public function up()
        {
                $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'unsigned'       => TRUE,
                                'auto_increment' => TRUE
                        ],

                        'announcement'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],

                        'description'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '255',
                        ],



                        'speaker'       => [
                                'type'           => 'VARCHAR',
                                'constraint'     => '50',
                        ],

                        'announcement_date'       => [
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
                $this->forge->createTable('announcement');
        }

        public function down()
        {
                $this->forge->dropTable('announcement');
        }
}
