<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Marketing extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'imagemarketing'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionmarketing'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Marketing');
    }

    public function down()
    {
        $this->forge->dropTable('Marketing');
    }
}
