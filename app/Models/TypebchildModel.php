<?php

namespace App\Models;

use CodeIgniter\Model;

class TypebchildModel extends Model
{
    protected $table         = 'typebchildimage';
    protected $useTimestamps = true;
    protected $allowedFields = ['bchildimage','bcaptionchild','slugbchild'];

    public function getTypebchild($slugbchild = false)
    {
        if($slugbchild == false){
            return $this->findAll();
        }
        return $this->where(['slugbchild' => $slugbchild])->first();
    }
}
