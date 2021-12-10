<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Typebheroimage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'bheroimage'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugbtype'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Typebheroimage');
    }

    public function down()
    {
        $this->forge->dropTable('Typebheroimage');
    }
}
