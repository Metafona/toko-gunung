<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddVariantIdToCartAndOrders extends Migration
{
    public function up()
    {
        $this->forge->addColumn('cart', [
            'variant_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'product_id',
            ],
        ]);
        $this->forge->addColumn('order_items', [
            'variant_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'product_id',
            ],
            'variant_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'variant_id',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('cart', 'variant_id');
        $this->forge->dropColumn('order_items', 'variant_id');
        $this->forge->dropColumn('order_items', 'variant_name');
    }
}
