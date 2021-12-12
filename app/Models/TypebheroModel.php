<?php

namespace App\Models;

use CodeIgniter\Model;

class TypebheroModel extends Model
{
    protected $table         = 'typebheroimage';
    protected $useTimestamps = true;
    protected $allowedFields = ['bheroimage','bcaptionhero','slugbtype'];

    public function getTypebhero($slugbtype = false)
    {
        if($slugbtype == false){
            return $this->findAll();
        }
        return $this->where(['slugbtype' => $slugbtype])->first();
    }
}
