<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Metadescription extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'áuto_increment'=>true
            ],
            'metadescription'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Metadescription');
    }

    public function down()
    {
        $this->forge->dropTable('Metadescription');
    }
}
