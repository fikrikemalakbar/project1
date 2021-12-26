<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeaderModel;
class Dashboardheader extends BaseController
{
    
    public function __construct()
    {
        $this->headerModel = new HeaderModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
        return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard header',
            'header'=>$this->headerModel->getheader()
        ];
        return view('dashboard/header',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create header',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/header',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imageheader' => [
                'rules'=>'max_size[imageheader,1024]|is_image[imageheader]|mime_in[imageheader,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionheader'=>[
                'rules'=>'required|is_unique[header.captionheader]',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'caption sudah ada harus unique atau link sudah terdaftar'
                ]
            ],
            'titleheader'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=> 'text Audience harus di isi , tidak boleh kosong',
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboarheader/create')->withInput();

        }
        $imageheader = $this->request->getFile('imageheader');
        if($imageheader->getError() == 4)
        {
            $namaimageheader = 'blank.png';
        }
        else
        {
            $namaimageheader = $imageheader->getRandomName();
            $imageheader->move('assets/img/upload', $namaimageheader);
        }

      
      
       $this->headerModel->save([
           'id' => $this->request->getVar('id'),
           'imageheader' => $namaimageheader,
           'captionheader' => $this->request->getVar('captionheader'),
           'titleheader' => $this->request->getVar('titleheader'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardheader');
    }

        
    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $header = $this->headerModel->find($id);

        if($header['imageheader'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $header['imageheader']);
        }
        $this->headerModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardheader');
    }


    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit header',
            'validation'=> \Config\Services::validation(),
            'header' => $this->headerModel->getheader($id)
        ];

        return view('dashboard/edit/header',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $captionheaderlama = $this->headerModel->getheader($this->request->getVar('idheaderlama'));
        if($captionheaderlama['captionheader'] == $this->request->getVar('captionheader'))
        {
            $rule_captionheader = 'required';
        }
        else
        {
            $rule_captionheader = 'required|is_unique[header.captionheader]';
        }
        if(!$this->validate([
            'captionheader'=>[
                'rules'=>$rule_captionheader,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'imageheader' => [
                    'rules'=>'max_size[imageheader,1024]|is_image[imageheader]|mime_in[imageheader,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
                'titleheader'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=> 'text Audience harus di isi , tidak boleh kosong',
                    ]
                ],
    
        ]))
        {
       
            return redirect()->to('/dashboardheader/edit/' . $this->request->getVar('id'))->withInput();
        }
        $fileimageheader = $this->request->getFile('imageheader');
        if($fileimageheader->getError() == 4)
        {
            $namaimageheader = $this->request->getVar('oldimageheader');
        }else{
            $namaimageheader = $fileimageheader->getRandomName();
            $fileimageheader->move('assets/img/upload', $namaimageheader);
            unlink('assets/img/upload/' . $this->request->getVar('oldimageheader'));
        }
        
       $this->headerModel->save([
           'id' => $id,
           'imageheader' => $namaimageheader,
           'captionheader' => $this->request->getVar('captionheader'),
           'titleheader' => $this->request->getVar('titleheader'),
         
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardheader');
    }


}
