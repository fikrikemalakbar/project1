<?php

namespace App\Models;

use CodeIgniter\Model;

class Feature extends Model
{
    
    protected $table         = 'feature';
    protected $useTimestamps = true;
    protected $allowedFields = ['namefeature','altfeature','slugfeature','featuretext'];

    public function getFeature($slugfeature = false)
    {
        if($slugfeature == false){
            return $this->findAll();
        }
        return $this->where(['slugfeature' => $slugfeature])->first();
    }

}
