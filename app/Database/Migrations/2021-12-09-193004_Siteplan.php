<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siteplan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'title'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'imagesite'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionsite'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'imagemaps'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionmaps'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugsite'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Siteplan');
    }

    public function down()
    {
        $this->forge->dropTable('Siteplan');
    }
}
