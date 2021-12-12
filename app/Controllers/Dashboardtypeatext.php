<?php

namespace App\Controllers;
use App\Models\TypeatextModel;
use App\Controllers\BaseController;

class Dashboardtypeatext extends BaseController
{
    public function __construct()
    {
        $this->typeatextModel = new TypeatextModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

        $data = [
            'title'=>'Dashboard Type A text',
            'typeatext'=>$this->typeatextModel->getTypeatext()
        ];
        return view('dashboard/typeatext',$data);
    }

    
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create typeatext',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typeatext',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'texttypea'=>[
                'rules'=>'required',
                'errors'=>[
                    'requireed'=>'Harus di isi'
                ]
            ]

        ]))
        {
             return redirect()->to('/dashboardtypeatext/create')->withInput();

        }
        // $id = url_title($this->request->getVar('id'), true);
    
       $this->typeatextModel->save([
            'id'=>$this->request->getVar('id'),
           'texttypea'=> $this->request->getVar('texttypea')
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypeatext');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $this->typeatextModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypeatext');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'form edit feature',
            'validation'=> \Config\Services::validation(),
            'typeatext' => $this->typeatextModel->getTypeatext($id)
        ];

        return view('dashboard/edit/typeatext',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        if(!$this->validate([
            'texttypea'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                ]
                ]
        ]))
        {
       
            return redirect()->to('/dashboardtypeatext/edit/' . $this->request->getVar('id'))->withInput();
        }
        
        
       $this->typeatextModel->save([
           'id' => $id,
           'texttypea' => $this->request->getVar('texttypea'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypeatext');
    }


}
