<?php

namespace App\Controllers;
use App\Models\TypebtextModel;
use App\Controllers\BaseController;

class Dashboardtypebtext extends BaseController
{
    public function __construct()
    {
        $this->typebtextModel = new TypebtextModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

        $data = [
            'title'=>'Dashboard Type A text',
            'typebtext'=>$this->typebtextModel->getTypebtext()
        ];
        return view('dashboard/typebtext',$data);
    }

    
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create typebtext',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typebtext',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'texttypeb'=>[
                'rules'=>'required',
                'errors'=>[
                    'requireed'=>'Harus di isi'
                ]
            ]

        ]))
        {
             return redirect()->to('/dashboardtypebtext/create')->withInput();

        }
        // $id = url_title($this->request->getVar('id'), true);
    
       $this->typebtextModel->save([
            'id'=>$this->request->getVar('id'),
           'texttypeb'=> $this->request->getVar('texttypeb')
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypebtext');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $this->typebtextModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypebtext');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'form edit feature',
            'validation'=> \Config\Services::validation(),
            'typebtext' => $this->typebtextModel->getTypebtext($id)
        ];

        return view('dashboard/edit/typebtext',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        if(!$this->validate([
            'texttypeb'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                ]
                ]
        ]))
        {
       
            return redirect()->to('/dashboardtypebtext/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        
       $this->typebtextModel->save([
           'id' => $id,
           'texttypeb' => $this->request->getVar('texttypeb'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypebtext');
    }

}
