<?php

namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table         = 'bank';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','imagebank','captionbank'];

    public function getbank($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
