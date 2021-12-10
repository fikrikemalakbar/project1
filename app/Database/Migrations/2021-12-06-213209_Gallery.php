<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gallery extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'alt'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],
            'slug'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],
            'name'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Gallery');
    }

    public function down()
    {
        $this->forge->dropTable('Gallery');
    }
}
