<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Feature extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'img'=>[
                'type'=>'VARCHAR',
                'constraint'=>200
            ],
            'slug'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],
            'text'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('Feature');
    }

    public function down()
    {
        $this->forge->dropTable('Feature');
    }
}
