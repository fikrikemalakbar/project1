<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Typea extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
              'type'=>'INT',
              'unsigned'=>true,
              'auto_increment'=>true
            ],
            'heroimage'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionheroimagea'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'childimagesatu'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionchildimagesatua'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'childimagedua'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'captionchildimageduaa'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'texttypea'=>[
                'type'=>'TEXT'
            ],
            'slugtypea'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Typea');
    }

    public function down()
    {
        $this->forge->dropTable('Typea');
    }
}
