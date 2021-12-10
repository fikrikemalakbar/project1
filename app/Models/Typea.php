<?php

namespace App\Models;

use CodeIgniter\Model;

class Typea extends Model
{
    
    protected $table         = 'typea';
    protected $useTimestamps = true;
    protected $allowedFields = ['heroimage','captionheroimagea','childimagesatu','captionchildimagesatua','childimagedua','captionchildimageduaa','texttypea','slugtypea'];

    public function getTypea($slugtypea = false)
    {
        if($slugtypea == false){
            return $this->findAll();
        }
        return $this->where(['slugtypea' => $slugtypea])->first();
    }

}
