<?php

namespace App\Controllers;
use App\Models\Feature;


class Home extends BaseController
{
    public function __construct()
    {
        $this->featureModel = new feature();
    }
    public function index()
    {
        $data = [
            'title'=>'Home',
            'feature'=>$this->featureModel->getFeature()
            
        ];
        return view('front/main/home',$data);
    }
}
