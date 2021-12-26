<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BackgroundsiteplanModel;

class Dashboardbackgroundsiteplan extends BaseController
{
    
    public function __construct()
    {
        $this->backgroundsiteplanModel = new BackgroundsiteplanModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
        return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard backgroundsiteplan',
            'backgroundsiteplan'=>$this->backgroundsiteplanModel->getbackgroundsiteplan()
        ];
        return view('dashboard/backgroundsiteplan',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create backgroundsiteplan',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/backgroundsiteplan',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imagebackgroundsiteplan' => [
                'rules'=>'max_size[imagebackgroundsiteplan,1024]|is_image[imagebackgroundsiteplan]|mime_in[imagebackgroundsiteplan,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionbackgroundsiteplan'=>[
                'rules'=>'required|is_unique[backgroundsiteplan.captionbackgroundsiteplan]',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'caption sudah ada harus unique atau link sudah terdaftar'
                ]
            ],
            'titlebackgroundsiteplan'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'text Audience harus di isi , tidak boleh kosong',
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboarbackgroundsiteplan/create')->withInput();

        }
        $imagebackgroundsiteplan = $this->request->getFile('imagebackgroundsiteplan');
        if($imagebackgroundsiteplan->getError() == 4)
        {
            $namaimagebackgroundsiteplan = 'blank.png';
        }
        else
        {
            $namaimagebackgroundsiteplan = $imagebackgroundsiteplan->getRandomName();
            $imagebackgroundsiteplan->move('assets/img/upload', $namaimagebackgroundsiteplan);
        }

      
      
       $this->backgroundsiteplanModel->save([
           'id' => $this->request->getVar('id'),
           'imagebackgroundsiteplan' => $namaimagebackgroundsiteplan,
           'captionbackgroundsiteplan' => $this->request->getVar('captionbackgroundsiteplan'),
           'titlebackgroundsiteplan' => $this->request->getVar('titlebackgroundsiteplan'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardbackgroundsiteplan');
    }

        
    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $backgroundsiteplan = $this->backgroundsiteplanModel->find($id);

        if($backgroundsiteplan['imagebackgroundsiteplan'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $backgroundsiteplan['imagebackgroundsiteplan']);
        }
        $this->backgroundsiteplanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardbackgroundsiteplan');
    }


    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit backgroundsiteplan',
            'validation'=> \Config\Services::validation(),
            'backgroundsiteplan' => $this->backgroundsiteplanModel->getbackgroundsiteplan($id)
        ];

        return view('dashboard/edit/backgroundsiteplan',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $captionbackgroundsiteplanlama = $this->backgroundsiteplanModel->getbackgroundsiteplan($this->request->getVar('idbackgroundsiteplanlama'));
        if($captionbackgroundsiteplanlama['captionbackgroundsiteplan'] == $this->request->getVar('captionbackgroundsiteplan'))
        {
            $rule_captionbackgroundsiteplan = 'required';
        }
        else
        {
            $rule_captionbackgroundsiteplan = 'required|is_unique[backgroundsiteplan.captionbackgroundsiteplan]';
        }
        if(!$this->validate([
            'captionbackgroundsiteplan'=>[
                'rules'=>$rule_captionbackgroundsiteplan,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'imagebackgroundsiteplan' => [
                    'rules'=>'max_size[imagebackgroundsiteplan,1024]|is_image[imagebackgroundsiteplan]|mime_in[imagebackgroundsiteplan,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
                'titlebackgroundsiteplan'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=> 'text Audience harus di isi , tidak boleh kosong',
                    ]
                ],
    
        ]))
        {
       
            return redirect()->to('/dashboardbackgroundsiteplan/edit/' . $this->request->getVar('id'))->withInput();
        }
        $fileimagebackgroundsiteplan = $this->request->getFile('imagebackgroundsiteplan');
        if($fileimagebackgroundsiteplan->getError() == 4)
        {
            $namaimagebackgroundsiteplan = $this->request->getVar('oldimagebackgroundsiteplan');
        }else{
            $namaimagebackgroundsiteplan = $fileimagebackgroundsiteplan->getRandomName();
            $fileimagebackgroundsiteplan->move('assets/img/upload', $namaimagebackgroundsiteplan);
            unlink('assets/img/upload/' . $this->request->getVar('oldimagebackgroundsiteplan'));
        }
        
       $this->backgroundsiteplanModel->save([
           'id' => $id,
           'imagebackgroundsiteplan' => $namaimagebackgroundsiteplan,
           'captionbackgroundsiteplan' => $this->request->getVar('captionbackgroundsiteplan'),
           'titlebackgroundsiteplan' => $this->request->getVar('titlebackgroundsiteplan'),
         
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardbackgroundsiteplan');
    }

}
