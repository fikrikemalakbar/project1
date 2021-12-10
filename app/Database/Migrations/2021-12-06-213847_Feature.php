<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Feature extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'namefeature'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'altfeature'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'slugfeature'=>[
                'type'=>'VARCHAR',
                'constraint'=>225
            ],
            'featuretext'=>[
                'type'=>'TEXT'
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('Feature');
    }

    public function down()
    {
        $this->forge->dropTable('Feature');
    }
}
