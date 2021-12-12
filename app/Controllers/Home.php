<?php

namespace App\Controllers;
use App\Models\Feature;
use App\Models\TypeaheroModel;
use App\Models\TypeachildModel;
use App\Models\TypeatextModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->featureModel = new feature();
        $this->typeaheroModel = new TypeaheroModel();
        $this->typeachildModel = new TypeachildModel();
        $this->typeatextModel = new TypeatextModel();
    }
    public function index()
    {
        $data = [
            'title'=>'Home',
            'feature'=>$this->featureModel->getFeature(),
            'typeahero'=>$this->typeaheroModel->getTypeahero(),
            'typeachild'=>$this->typeachildModel->getTypeachild(),
            'typeatext'=>$this->typeatextModel->getTypeatext()
            
        ];
        return view('front/main/home',$data);
    }
}
