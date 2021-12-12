<?php

namespace App\Controllers;

use App\Models\TypebchildModel;
use App\Controllers\BaseController;

class Dashboardtypebchild extends BaseController
{
    public function __construct()
    {
        $this->typebchildModel = new TypebchildModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard Type B Child',
            'typebchild'=>$this->typebchildModel->getTypebchild()
        ];
        return view('dashboard/typebchild',$data);
    }

    public function detail($slugbchild)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Type B child',
           'typebchild'=> $this->typebchildModel->getTypebchild($slugbchild)
       ];

       if(empty($data['typebchild']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugbchild   . ' tidak di temukan.');
       }

       return view('dashboard/detail/typebchild',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Type B Child',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typebchild',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'bchildimage' => [
                'rules'=>'max_size[bchildimage,2048]|is_image[bchildimage]|mime_in[bchildimage,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'bcaptionchild'=>[
                'rules'=>'required|is_unique[typebchildimage.bcaptionchild]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardtypebchild/create')->withInput();

        }
        $bchildimage = $this->request->getFile('bchildimage');
        if($bchildimage->getError() == 4)
        {
            $namabchildimage = 'blank.png';
        }
        else
        {
            $namabchildimage = $bchildimage->getRandomName();
            $bchildimage->move('assets/img/uploadtypebchild', $namabchildimage);
        }
        $slugbchild = url_title($this->request->getVar('bcaptionchild'), '-', true);
       $this->typebchildModel->save([
           'slugbchild' => $slugbchild,
           'bchildimage' => $namabchildimage,
           'bcaptionchild' => $this->request->getVar('bcaptionchild'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypebchild');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $typebchild = $this->typebchildModel->find($id);

        if($typebchild['bchildimage'] != 'blank.png')
        {
            unlink('assets/img/uploadtypebchild/' . $typebchild['bchildimage']);
        }

        $this->typebchildModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypebchild');
    }


    public function edit($slugbchild)
    {
        $data = [
            'title' => 'form edit Type B child',
            'validation'=> \Config\Services::validation(),
            'typebchild' => $this->typebchildModel->getTypebchild($slugbchild)
        ];

        return view('dashboard/edit/typebchild',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldbchildimage = $this->typebchildModel->getTypebchild($this->request->getVar('slugbchild'));
        if($oldbchildimage['bcaptionchild'] == $this->request->getVar('bcaptionchild'))
        {
            $rule_bcaptionchild = 'required';
        }
        else
        {
            $rule_bcaptionchild = 'required|is_unique[typebchildimage.bcaptionchild]';
        }
        if(!$this->validate([
            'bcaptionchild'=>[
                'rules'=>$rule_bcaptionchild,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'bchildimage' => [
                    'rules'=>'max_size[bchildimage,2048]|is_image[bchildimage]|mime_in[bchildimage,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardtypebchild/edit/' . $this->request->getVar('slugbchild'))->withInput();
        }
        $filebchildimage = $this->request->getFile('bchildimage');
        if($filebchildimage->getError() == 4)
        {
            $namebchildimage = $this->request->getVar('oldbchild');
        }else{
            $namebchildimage = $filebchildimage->getRandomName();
            $filebchildimage->move('assets/img/uploadtypebchild', $namebchildimage);
            unlink('assets/img/uploadtypebchild/' . $this->request->getVar('oldbchild'));
        }
        $slugbchild = url_title($this->request->getVar('bcaptionchild'), '-', true);
       $this->typebchildModel->save([
           'id' => $id,
           'bchildimage' => $namebchildimage,
           'bcaptionchild' => $this->request->getVar('bcaptionchild'),
           'slugfeature' => $slugbchild,
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypebchild');
    }


}
