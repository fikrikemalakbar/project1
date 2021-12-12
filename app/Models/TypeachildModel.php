<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeachildModel extends Model
{
    protected $table         = 'typeachildimage';
    protected $useTimestamps = true;
    protected $allowedFields = ['achildimage','acaptionchild','slugachild'];

    public function getTypeachild($slugachild = false)
    {
        if($slugachild == false){
            return $this->findAll();
        }
        return $this->where(['slugachild' => $slugachild])->first();
    }
}
