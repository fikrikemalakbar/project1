<?php

namespace App\Controllers;
use App\Models\ContactpersonModel;
use App\Controllers\BaseController;

class Dashboardcontactperson extends BaseController
{
    public function __construct()
    {
        $this->contactpersonModel = new ContactpersonModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

        $data = [
            'title'=>'Dashboard Contact Person',
            'contactperson'=>$this->contactpersonModel->getcontactperson()
        ];
        return view('dashboard/contactperson',$data);
    }
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create contactperson',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/contactperson',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'wa'=>[
                'rules'=>'required|max_length[20]|is_unique[contactperson.wa]',
                'errors'=>[
                    'requireed'=>'Nomor Whatsapp Harus di isi',
                    'max_length'=> 'Nomor Whatsapp Maximal 20 Character atau Number',
                    'is_unique'=>'Nomor Whatsapp ini sudah ada'
                ]
            ],
            'ph'=>[
                'rules'=>'required|max_length[20]|is_unique[contactperson.ph]',
                'errors'=>[
                    'requireed'=>'Nomor Telephone Harus di isi',
                    'max_length'=> 'Nomor Telephone Maximal 20 Character atau Number',
                    'is_unique'=>'Nomor Telephone ini sudah ada'
                ]
            ],
            'alamat'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'Harus DI Isi'
                ]
                ],
                'email'=>[
                    'rules'=>'required|is_unique[contactperson.email]',
                    'errors'=>[
                        'required'=>'Harus DI Isi',
                        'is_unique'=>'Email sudah ada, please ganti email lain'
                    ]
                ]

        ]))
        {
             return redirect()->to('/dashboardcontactperson/create')->withInput();

        }
      
    
       $this->contactpersonModel->save([
            'id'=>$this->request->getVar('id'),
            'wa'=> $this->request->getVar('wa'),
            'ph'=> $this->request->getVar('ph'),
            'alamat'=> $this->request->getVar('alamat'),
            'email'=> $this->request->getVar('email')
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardcontactperson');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $this->contactpersonModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardcontactperson');
    }


    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit feature',
            'validation'=> \Config\Services::validation(),
            'contactperson' => $this->contactpersonModel->getcontactperson($id)
        ];

        return view('dashboard/edit/contactperson',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $walama = $this->contactpersonModel->getcontactperson($this->request->getVar('idlama'));
        if($walama['wa'] == $this->request->getVar('wa'))
        {
            $rule_wa = 'required';
        }
        else
        {
            $rule_wa = 'required|is_unique[contactperson.wa]';
        }
        $phlama = $this->contactpersonModel->getcontactperson($this->request->getVar('idlama'));
        if($phlama['ph'] == $this->request->getVar('ph'))
        {
            $rule_ph = 'required';
        }
        else
        {
            $rule_ph = 'required|is_unique[contactperson.ph]';
        }
        $emaillama = $this->contactpersonModel->getcontactperson($this->request->getVar('idlama'));
        if($emaillama['email'] == $this->request->getVar('email'))
        {
            $rule_email = 'required';
        }
        else
        {
            $rule_email = 'required|is_unique[contactperson.email]';
        }
        if(!$this->validate([
            'wa'=>[
                'rules'=>$rule_wa,
                'errors'=>[
                    'required'=> 'Nomor Whatsapp Harus Di Isi',
                    'is_unique'=> 'Nomor Whatsapp ini sudah ada'
                ]
                ],
                'ph'=>[
                    'rules'=>$rule_ph,
                    'errors'=>[
                        'required'=> 'Nomor Telephone Harus Di Isi',
                        'is_unique'=> 'Nomor Telephone ini sudah ada'
                    ]
                    ],
                'alamat'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Harus DI Isi'
                    ]
                    ],
                    'email'=>[
                        'rules'=>$rule_email,
                        'errors'=>[
                            'required'=> 'Nomor Telephone Harus Di Isi',
                            'is_unique'=> 'Nomor Telephone ini sudah ada'
                        ]
                        ],
        ]))
        {
            return redirect()->to('/dashboardcontactperson/edit/' . $this->request->getVar('id'))->withInput();

       }
     
   
      $this->contactpersonModel->save([
           'id'=>$id,
           'wa'=> $this->request->getVar('wa'),
           'ph'=> $this->request->getVar('ph'),
           'alamat'=> $this->request->getVar('alamat'),
           'email'=> $this->request->getVar('email')
      ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardcontactperson');
    }


}
