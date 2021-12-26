<?php

namespace App\Models;

use CodeIgniter\Model;

class MetakeywordModel extends Model
{
    protected $table         = 'metakeyword';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','metakeyword'];

    public function getmetakeyword($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
