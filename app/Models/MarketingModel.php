<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingModel extends Model
{
    protected $table         = 'marketing';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','imagemarketing','captionmarketing'];

    public function getmarketing($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
