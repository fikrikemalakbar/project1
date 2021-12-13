<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Audience extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'imageaudience'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'altaudience'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'nameaudience'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'textaudience'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Audience');
    }

    public function down()
    {
        $this->forge->dropTable('Audience');
    }
}
