<?php

namespace App\Controllers;
use App\Models\AudienceModel;
use App\Controllers\BaseController;

class Dashboardaudience extends BaseController
{
    public function __construct()
    {
        $this->audienceModel = new AudienceModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard audience',
            'audience'=>$this->audienceModel->getaudience()
        ];
        return view('dashboard/audience',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create audience',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/audience',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imageaudience' => [
                'rules'=>'max_size[imageaudience,1024]|is_image[imageaudience]|mime_in[imageaudience,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'altaudience'=>[
                'rules'=>'required|is_unique[audience.altaudience]',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'caption sudah ada harus unique atau link sudah terdaftar'
                ]
            ],

            'nameaudience'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'Nama Audience harus di isi , tidak boleh kosong',
                ]
            ],
            'textaudience'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'text Audience harus di isi , tidak boleh kosong',
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardaudience/create')->withInput();

        }
        $imageaudience = $this->request->getFile('imageaudience');
        if($imageaudience->getError() == 4)
        {
            $namaimageaudience = 'blank.png';
        }
        else
        {
            $namaimageaudience = $imageaudience->getRandomName();
            $imageaudience->move('assets/img/upload', $namaimageaudience);
        }

      
      
       $this->audienceModel->save([
           'id' => $this->request->getVar('id'),
           'imageaudience' => $namaimageaudience,
           'altaudience' => $this->request->getVar('altaudience'),
           'nameaudience' => $this->request->getVar('nameaudience'),
           'textaudience' => $this->request->getVar('textaudience'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardaudience');
    }

        
    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $audience = $this->audienceModel->find($id);

        if($audience['imageaudience'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $audience['imageaudience']);
        }
        $this->audienceModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardaudience');
    }

     
    public function edit($id)
    {
        $data = [
            'title' => 'form edit audience',
            'validation'=> \Config\Services::validation(),
            'audience' => $this->audienceModel->getaudience($id)
        ];

        return view('dashboard/edit/audience',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $captionaudiencelama = $this->audienceModel->getaudience($this->request->getVar('idaudiencelama'));
        if($captionaudiencelama['altaudience'] == $this->request->getVar('altaudience'))
        {
            $rule_altaudience = 'required';
        }
        else
        {
            $rule_altaudience = 'required|is_unique[audience.altaudience]';
        }
        if(!$this->validate([
            'altaudience'=>[
                'rules'=>$rule_altaudience,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'imageaudience' => [
                    'rules'=>'max_size[imageaudience,1024]|is_image[imageaudience]|mime_in[imageaudience,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
                'nameaudience'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=> 'Nama Audience harus di isi , tidak boleh kosong',
                    ]
                ],
                'textaudience'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=> 'text Audience harus di isi , tidak boleh kosong',
                    ]
                ],
    
        ]))
        {
       
            return redirect()->to('/dashboardaudience/edit/' . $this->request->getVar('id'))->withInput();
        }
        $fileimageaudience = $this->request->getFile('imageaudience');
        if($fileimageaudience->getError() == 4)
        {
            $namaimageaudience = $this->request->getVar('oldimageaudience');
        }else{
            $namaimageaudience = $fileimageaudience->getRandomName();
            $fileimageaudience->move('assets/img/upload', $namaimageaudience);
            unlink('assets/img/upload/' . $this->request->getVar('oldimageaudience'));
        }
        
       $this->audienceModel->save([
           'id' => $id,
           'imageaudience' => $namaimageaudience,
           'altaudience' => $this->request->getVar('altaudience'),
           'nameaudience' => $this->request->getVar('nameaudience'),
           'textaudience' => $this->request->getVar('textaudience'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardaudience');
    }
}
