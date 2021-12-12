<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bank extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'imagebank'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionbank'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Bank');
    }

    public function down()
    {
        $this->forge->dropTable('Bank');
    }
}
