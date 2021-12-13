<?php

namespace App\Models;

use CodeIgniter\Model;

class AudienceModel extends Model
{
    protected $table         = 'audience';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','imageaudience','altaudience','nameaudience','textaudience'];

    public function getaudience($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
