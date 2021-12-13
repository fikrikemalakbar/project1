<?php

namespace App\Models;

use CodeIgniter\Model;

class MetadescriptionModel extends Model
{
    protected $table         = 'metadescription';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','metadescription'];

    public function getmetadescription($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
