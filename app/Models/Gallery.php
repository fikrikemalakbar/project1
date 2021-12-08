<?php

namespace App\Models;

use CodeIgniter\Model;

class Gallery extends Model
{
    
    protected $table         = 'gallery';
    protected $useTimestamps = true;
    protected $allowedFields = ['name','slug','alt'];

    public function getGallery($slug = false)
    {
        if($slug == false){
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

}
