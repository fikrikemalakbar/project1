<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactpersonModel extends Model
{
    protected $table         = 'contactperson';
    protected $useTimestamps = true;
    protected $allowedFields = ['wa','ph','alamat','email','id'];

    public function getcontactperson($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
