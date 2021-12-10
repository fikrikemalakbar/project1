<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Header extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigneed'=>true,
                'auto_increment'=>true
            ],
            'backgroundheader'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionheader'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'titleheader'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugheader'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Header');
    }

    public function down()
    {
        $this->forge->dropTable('Header');
    }
}
