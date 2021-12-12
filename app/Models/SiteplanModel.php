<?php

namespace App\Models;

use CodeIgniter\Model;

class SiteplanModel extends Model
{
    protected $table         = 'siteplan';
    protected $useTimestamps = true;
    protected $allowedFields = ['id','title','imagesite','captionsite','imagemaps','captionmaps'];

    public function getsiteplan($id = false)
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
