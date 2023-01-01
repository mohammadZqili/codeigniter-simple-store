<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'show_room'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'description'    => ['type' => 'text', 'null' => true],
            'image'   => ['type' => 'varchar', 'null' => true],

            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('categories', true);

    }

    public function down()
    {
        $this->forge->dropTable('categories', true);
    }
}
