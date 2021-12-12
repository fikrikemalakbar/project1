<?php

namespace App\Controllers;
use App\Models\TypebheroModel;

use App\Controllers\BaseController;

class Dashboardtypebhero extends BaseController
{
    public function __construct()
    {
        $this->typebheroModel = new TypebheroModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard Type B Hero',
            'typebhero'=>$this->typebheroModel->getTypebhero()
        ];
        return view('dashboard/typebhero',$data);
    }

    public function detail($slugbtype)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Type B Hero',
           'typebhero'=> $this->typebheroModel->getTypebhero($slugbtype)
       ];

       if(empty($data['typebhero']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugbtype   . ' tidak di temukan.');
       }

       return view('dashboard/detail/typebhero',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Type B Hero',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typebhero',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'bheroimage' => [
                'rules'=>'max_size[bheroimage,2048]|is_image[bheroimage]|mime_in[bheroimage,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'bcaptionhero'=>[
                'rules'=>'required|is_unique[typebheroimage.bcaptionhero]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardtypebhero/create')->withInput();

        }
        $bheroimage = $this->request->getFile('bheroimage');
        if($bheroimage->getError() == 4)
        {
            $namabheroimage = 'blank.png';
        }
        else
        {
            $namabheroimage = $bheroimage->getRandomName();
            $bheroimage->move('assets/img/uploadtypebhero', $namabheroimage);
        }
        $slugbtype = url_title($this->request->getVar('bcaptionhero'), '-', true);
       $this->typebheroModel->save([
           'slugbtype' => $slugbtype,
           'bheroimage' => $namabheroimage,
           'bcaptionhero' => $this->request->getVar('bcaptionhero'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypebhero');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $typebhero = $this->typebheroModel->find($id);

        if($typebhero['bheroimage'] != 'blank.png')
        {
            unlink('assets/img/uploadtypebhero/' . $typebhero['bheroimage']);
        }

        $this->typebheroModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypebhero');
    }


    
    public function edit($slugbtype)
    {
        $data = [
            'title' => 'form edit Type A Hero',
            'validation'=> \Config\Services::validation(),
            'typebhero' => $this->typebheroModel->getTypebhero($slugbtype)
        ];

        return view('dashboard/edit/typebhero',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldbheroimage = $this->typebheroModel->getTypebhero($this->request->getVar('slugbtype'));
        if($oldbheroimage['bcaptionhero'] == $this->request->getVar('bcaptionhero'))
        {
            $rule_bcaptionhero = 'required';
        }
        else
        {
            $rule_bcaptionhero = 'required|is_unique[typebheroimage.bcaptionhero]';
        }
        if(!$this->validate([
            'bcaptionhero'=>[
                'rules'=>$rule_bcaptionhero,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'bheroimage' => [
                    'rules'=>'max_size[bheroimage,2048]|is_image[bheroimage]|mime_in[bheroimage,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardtypebhero/edit/' . $this->request->getVar('slugbtype'))->withInput();
        }
        $filebheroimage = $this->request->getFile('bheroimage');
        if($filebheroimage->getError() == 4)
        {
            $namebheroimage = $this->request->getVar('oldbhero');
        }else{
            $namebheroimage = $filebheroimage->getRandomName();
            $filebheroimage->move('assets/img/uploadtypebhero', $namebheroimage);
            unlink('assets/img/uploadtypebhero/' . $this->request->getVar('oldbhero'));
        }
        $slugbtype = url_title($this->request->getVar('bcaptionhero'), '-', true);
       $this->typebheroModel->save([
           'id' => $id,
           'bheroimage' => $namebheroimage,
           'bcaptionhero' => $this->request->getVar('bcaptionhero'),
           'slugfeature' => $slugbtype,
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypebhero');
    }





}
