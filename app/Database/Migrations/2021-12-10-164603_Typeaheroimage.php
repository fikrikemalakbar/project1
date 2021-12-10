<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Typeaheroimage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'aheroimage'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'acaptionhero'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugahero'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Typeaheroimage');
    }

    public function down()
    {
        $this->forge->dropTable('Typeaheroimage');
    }
}
