<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserAddresses extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'     => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'label'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'recipient'   => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'address'     => ['type' => 'TEXT'],
            'city'        => ['type' => 'VARCHAR', 'constraint' => 100],
            'province'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'postal_code' => ['type' => 'VARCHAR', 'constraint' => 20],
            'is_default'  => ['type' => 'BOOLEAN', 'default' => false],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('user_addresses');
    }

    public function down()
    {
        $this->forge->dropTable('user_addresses');
    }
}
