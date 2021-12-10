<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Typeatext extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unbsigned'=>true,
                'auto_increment'=>true
            ],
            'texttypea'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Typeatext');
    }

    public function down()
    {
        $this->forge->dropTable('Typeatext');
    }
}
