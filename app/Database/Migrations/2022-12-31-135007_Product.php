<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'model'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'color'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'price'         => ['type' => 'float', 'null' => true],
            'count'         => ['type' => 'int', 'null' => true],
            'specifications'    => ['type' => 'text', 'null' => true],
            'image_1'   => ['type' => 'varchar', 'null' => true],
            'image_2'   => ['type' => 'varchar', 'null' => true],
            'image_3'   => ['type' => 'varchar', 'null' => true],
            'image_4'   => ['type' => 'varchar', 'null' => true],

            'category_id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'brand_id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],


            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('products', true);

    }

    public function down()
    {
        $this->forge->dropTable('products', true);
    }
}
