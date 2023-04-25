<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableContact extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'mail' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'content' => [
                'type'       => 'TEXT',
            ],
            'seen' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
            'readed' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
            'created_date datetime default current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('contact');
    }

    public function down()
    {
        $this->forge->dropTable('contact');
    }
}
