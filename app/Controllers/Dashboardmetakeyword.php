<?php

namespace App\Controllers;
use App\Models\MetakeywordModel;
use App\Controllers\BaseController;

class Dashboardmetakeyword extends BaseController
{
    public function __construct()
    {
        $this->metakeywordModel = new MetakeywordModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard metakeyword',
            'metakeyword'=>$this->metakeywordModel->getmetakeyword()
        ];
        return view('dashboard/metakeyword',$data);
    }

        
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create metakeyword',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/metakeyword',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'metakeyword'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                ]
            ]

        ]))
        {
             return redirect()->to('/dashboardmetakeyword/create')->withInput();

        }
        
      
      
       $this->metakeywordModel->save([
           'id' => $this->request->getVar('id'),
           'metakeyword' => $this->request->getVar('metakeyword'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardmetakeyword');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $this->metakeywordModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardmetakeyword');
    }

    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit feature',
            'validation'=> \Config\Services::validation(),
            'metakeyword' => $this->metakeywordModel->getmetakeyword($id)
        ];

        return view('dashboard/edit/metakeyword',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
                'metakeyword'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Harus DI Isi'
                    ]
                    ]
        ]))
        {
            return redirect()->to('/dashboardmetakeyword/edit/' . $this->request->getVar('id'))->withInput();

       }
     
   
      $this->metakeywordModel->save([
           'id'=>$id,
           'metakeyword'=> $this->request->getVar('metakeyword'),
      ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardmetakeyword');
    }

}
