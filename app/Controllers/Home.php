<?php

namespace App\Controllers;
use App\Models\Feature;
use App\Models\Typea;

class Home extends BaseController
{
    public function __construct()
    {
        $this->featureModel = new feature();
        $this->typeaModel = new Typea();
    }
    public function index()
    {
        $data = [
            'title'=>'Home',
            'feature'=>$this->featureModel->getFeature(),
            'typea'=>$this->typeaModel->getTypea()
            
        ];
        return view('front/main/home',$data);
    }
}
