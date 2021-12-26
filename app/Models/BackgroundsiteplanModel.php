<?php

namespace App\Models;

use CodeIgniter\Model;

class BackgroundsiteplanModel extends Model
{
    protected $table         = 'backgroundsiteplan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','imagebackgroundsiteplan','captionbackgroundsiteplan','titlebackgroundsiteplan'];

    public function getbackgroundsiteplan($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
