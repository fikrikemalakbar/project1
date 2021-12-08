<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' =>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'name' =>[
                'type'=>'VARCHAR',
                'constraint'=>50
            ],
            'email' =>[
                'type'=>'VARCHAR',
                'constraint'=>100,
                'unique'=>true
            ],
            'password'=>[
                'type'=>'VARCHAR',
                'constraint'=>200
            ],
            // 'profil_pic' =>[
            //     'type'=>'VARCHAR',
            //     'constraint'=>255,
            //     'null'=>true,
            //     'default'=>'blank.jpg'
            // ],
            'profil_pic'=>[
                'type'=>'VARCHAR',
                'constraint'=>255
            ],
            'status'=>[
                'type'=>'VARCHAR',
                'constraint'=>20,
                'default'=>'inactive'
            ],
            'uniid'=>[
                'type'=>'VARCHAR',
                'constraint'=>32
            ],
            'activation_date'=>[
                'type'=>'DATETIME',

            ],
            'update_at'=>[
                'type' => 'DATETIME'
            ],
            'create_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('Users');
    }

    public function down()
    {
        $this->forge->dropTable('Users');
    }
}
