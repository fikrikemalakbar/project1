<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderModel extends Model
{
    protected $table         = 'header';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','imageheader','captionheader','titleheader'];

    public function getheader($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
