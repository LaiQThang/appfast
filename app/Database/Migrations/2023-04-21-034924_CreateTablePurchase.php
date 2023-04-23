<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablePurchase extends Migration
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
            'price' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'email_address' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'storage' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'databases' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'domain' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'support' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('purchases');
    }

    public function down()
    {
        $this->forge->dropTable('purchases');
    }
}
