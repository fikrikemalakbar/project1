<?php

namespace App\Models;

use CodeIgniter\Model;

class Typeb extends Model
{
    
    protected $table         = 'typeb';
    protected $useTimestamps = true;
    protected $allowedFields = ['heroimagetypeb','captionheroimageb','childimagesatutypeb','captionchildsatuimageb','childimageduatypeb','captionchildduaimageb','texttypeb','slugtypeb'];

    public function getTypeb($slugtypeb = false)
    {
        if($slugtypeb == false){
            return $this->findAll();
        }
        return $this->where(['slugtypeb' => $slugtypeb])->first();
    }

}
