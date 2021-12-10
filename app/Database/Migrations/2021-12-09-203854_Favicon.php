<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Favicon extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'imagefavicon'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
                ],
            'captionfavicon'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugfavicon'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Favicon');
    }

    public function down()
    {
        $this->forge->dropTable('Favicon');
    }
}
