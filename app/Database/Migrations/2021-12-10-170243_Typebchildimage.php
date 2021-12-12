<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Typebchildimage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true,
            ],
            'bchildimage'=>[
                'type'=>'VARCHAR',
                'constraint'=>225,
            ],
            'bcaptionchild'=>[
                'type'=>'VARCHAR',
                'constraint'=>225,
            ],
            'slugbchild'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Typebchildimage');
    }

    public function down()
    {
        $this->forge->dropTable('Typebchildimage');
    }
}
