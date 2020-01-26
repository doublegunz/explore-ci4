<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Notes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'=> 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'description' => [
                'type' => 'TEXT',
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('notes');

    }

    public function down()
    {
        $this->forge->dropTable('notes');
    }
}