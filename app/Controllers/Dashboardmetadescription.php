<?php

namespace App\Controllers;
use App\Models\MetadescriptionModel;
use App\Controllers\BaseController;

class Dashboardmetadescription extends BaseController
{
    public function __construct()
    {
        $this->metadescriptionModel = new MetaDescriptionModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard metadescription',
            'metadescription'=>$this->metadescriptionModel->getmetadescription()
        ];
        return view('dashboard/metadescription',$data);
    }

        
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create metadescription',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/metadescription',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'metadescription'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                ]
            ]

        ]))
        {
             return redirect()->to('/dashboardmetadescription/create')->withInput();

        }
        
      
      
       $this->metadescriptionModel->save([
           'id' => $this->request->getVar('id'),
           'metadescription' => $this->request->getVar('metadescription'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardmetadescription');
    }
}
