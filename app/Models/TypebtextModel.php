<?php

namespace App\Models;

use CodeIgniter\Model;

class TypebtextModel extends Model
{
    protected $table         = 'typebtext';
    protected $useTimestamps = true;
    protected $allowedFields = ['texttypeb','id'];

    public function getTypebtext($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
