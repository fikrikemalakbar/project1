<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Metakeyword extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'metakeyword'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Metakeyword');
    }

    public function down()
    {
        $this->forge->dropTable('MetaKeyword');
    }
}
