<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Typeb extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
              'type'=>'INT',
              'unsigned'=>true,
              'auto_increment'=>true
            ],
            'heroimagetypeb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionheroimageb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'childimagesatutypeb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionchildsatuimageb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'childimageduatypeb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionchildduaimageb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'texttypeb'=>[
                'type'=>'TEXT'
            ],
            'slugtypeb'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Typeb');
    }

    public function down()
    {
        $this->forge->dropTable('Typeb');
    }
}
