<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LoginActivity extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>TRUE,
                'auto_increment'=>TRUE
            ],
            'uniid'=>[
                'type'=>'VARCHAR',
                'constraint'=>32
            ],
            'agent'=>[
                'type'=>'VARCHAR',
                'constraint'=>100
            ],
            'ip'=>[
                'type'=>'VARCHAR',
                'constraint'=>30
            ],
            'login_time'=>[
                'type'=>'DATETIME'
            ],
            'logout_time'=>[
                'type' => 'DATETIME'
            ]
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('LoginActivity');
    }

    public function down()
    {
        
        $this->forge->dropTable('LoginActivity');
    }
}
