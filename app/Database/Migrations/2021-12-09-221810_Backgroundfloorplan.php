<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Backgroundfloorplan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'titlebg'=>[
                'type'=>'TEXT'
            ],
            'textb'=>[
                'type'=>'TEXT'
            ],
            
            'imagebg'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionbg'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugbg'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Backgroundfloorplan');
    }

    public function down()
    {
        $this->forge->dropTable('Backgroundfloorplan');
    }
}
