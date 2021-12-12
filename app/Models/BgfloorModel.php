<?php

namespace App\Models;

use CodeIgniter\Model;

class BgfloorModel extends Model
{
    protected $table         = 'backgroundfloorplan';
    protected $useTimestamps = true;
    protected $allowedFields = ['titlebg','imagebg','captionbg','slugbg'];

    public function getbgfloor($slugbg = false)
    {
        if($slugbg == false){
            return $this->findAll();
        }
        return $this->where(['slugbg' => $slugbg])->first();
    }

}
