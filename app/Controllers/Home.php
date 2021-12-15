<?php

namespace App\Controllers;
use App\Models\Feature;
use App\Models\TypeaheroModel;
use App\Models\TypeachildModel;
use App\Models\TypeatextModel;
use App\Models\BgfloorModel;
use App\Models\TypebheroModel;
use App\Models\TypebchildModel;
use App\Models\TypebtextModel;
use App\Models\Gallery;
use App\Models\SiteplanModel;
use App\Models\MarketingModel;
use App\Models\ContactpersonModel;
use App\Models\BankModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->featureModel = new feature();
        $this->typeaheroModel = new TypeaheroModel();
        $this->typeachildModel = new TypeachildModel();
        $this->typeatextModel = new TypeatextModel();
        $this->bgfloorModel = new BgfloorModel();
        $this->typebheroModel = new TypebheroModel();
        $this->typebchildModel = new TypebchildModel();
        $this->typebtextModel = new TypebtextModel();
        $this->gallery = new Gallery();
        $this->siteplanModel = new SiteplanModel();
        $this->marketingnModel = new MarketingModel();
        $this->contactpersonModel = new ContactpersonModel();
        $this->bankModel = new BankModel();
    }
    public function index()
    {
        $data = [
            'title'=>'Home',
            'feature'=>$this->featureModel->getFeature(),
            'typeahero'=>$this->typeaheroModel->getTypeahero(),
            'typeachild'=>$this->typeachildModel->getTypeachild(),
            'typeatext'=>$this->typeatextModel->getTypeatext(),
            'bgfloor'=>$this->bgfloorModel->getbgfloor(),
            'typebhero'=>$this->typebheroModel->getTypebhero(),
            'typebchild'=>$this->typebchildModel->getTypebchild(),
            'typebtext'=>$this->typebtextModel->getTypebtext(),
            'gallery'=>$this->gallery->getGallery(),
            'siteplan'=>$this->siteplanModel->getsiteplan(),
            'marketing'=>$this->marketingnModel->getmarketing(),
            'contactperson'=>$this->contactpersonModel->getcontactperson(),
            'bank'=>$this->bankModel->getbank()
        ];
        return view('front/main/home',$data);
    }
}
