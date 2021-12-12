<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeatextModel extends Model
{
    protected $table         = 'typeatext';
    protected $useTimestamps = true;
    protected $allowedFields = ['texttypea','id'];

    public function getTypeatext($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
