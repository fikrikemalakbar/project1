<?php

namespace App\Models;

use CodeIgniter\Model;

class TypeaheroModel extends Model
{
    protected $table         = 'typeaheroimage';
    protected $useTimestamps = true;
    protected $allowedFields = ['aheroimage','acaptionhero','slugahero'];

    public function getTypeahero($slugahero = false)
    {
        if($slugahero == false){
            return $this->findAll();
        }
        return $this->where(['slugahero' => $slugahero])->first();
    }
}
