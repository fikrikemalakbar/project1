<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contactperson extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'wa'=>[
                'type'=>'VARCHAR',
                'constraint'=>20
            ],
            'ph'=>[
                'type'=>'VARCHAR',
                'constraint'=>20
            ],
            'alamat'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Contactperson');
    }

    public function down()
    {
        $this->forge->dropTable('Contactperson');
    }
}
