<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Backgroundsiteplan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigneed'=>true,
                'auto_increment'=>true
            ],
            'imagebackgroundsiteplan'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionbackgroundsiteplan'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'titlebackgroundsiteplan'=>[
                'type'=>'Text',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Backgroundsiteplan');
    }

    public function down()
    {
        $this->forge->dropTable('Backgroundsiteplan');
    }
}
