<?php

namespace App\Controllers;
use App\Models\BgfloorModel;
use App\Controllers\BaseController;

class Dashboardbgfloor extends BaseController
{
    
    public function __construct()
    {
        $this->bgfloorModel = new BgfloorModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }       
        $data = [
            'title'=>'Dashboard Background Floorplan',
            'bgfloor'=>$this->bgfloorModel->getbgfloor()
        ];
        return view('dashboard/bgfloor',$data);
    }

    
    public function detail($slugbg)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Bg Floor',
           'bgfloor'=> $this->bgfloorModel->getbgfloor($slugbg)
       ];

       if(empty($data['bgfloor']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugbg   . ' tidak di temukan.');
       }

       return view('dashboard/detail/bgfloor',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Background Floor',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/bgfloor',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imagebg' => [
                'rules'=>'max_size[imagebg,2048]|is_image[imagebg]|mime_in[imagebg,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionbg'=>[
                'rules'=>'required|is_unique[backgroundfloorplan.captionbg]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'titlebg'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=> 'title harus di isi , tidak boleh kosong',
                    ]
                    ],
                    'textb'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=> 'title harus di isi , tidak boleh kosong',
                        ]
                    ]
        ]))
        {
             return redirect()->to('/dashboardbgfloor/create')->withInput();

        }
        $bgfloorimage = $this->request->getFile('imagebg');
        if($bgfloorimage->getError() == 4)
        {
            $namabgfloorimage = 'blank.png';
        }
        else
        {
            $namabgfloorimage = $bgfloorimage->getRandomName();
            $bgfloorimage->move('assets/img/uploadbgfloor', $namabgfloorimage);
        }
        $slugbg = url_title($this->request->getVar('captionbg'), '-', true);
       $this->bgfloorModel->save([
           'slugbg' => $slugbg,
           'imagebg' => $namabgfloorimage,
           'titlebg' => $this->request->getVar('titlebg'),
           'textb' => $this->request->getVar('textb'),
           'captionbg' => $this->request->getVar('captionbg'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardbgfloor');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $bgfloor = $this->bgfloorModel->find($id);

        if($bgfloor['imagebg'] != 'blank.png')
        {
            unlink('assets/img/uploadbgfloor/' . $bgfloor['imagebg']);
        }

        $this->bgfloorModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardbgfloor');
    }

    public function edit($slugbg)
    {
        $data = [
            'title' => 'form edit Background floor',
            'validation'=> \Config\Services::validation(),
            'bgfloor' => $this->bgfloorModel->getbgfloor($slugbg)
        ];

        return view('dashboard/edit/bgfloor',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldcaptionbg = $this->bgfloorModel->getbgfloor($this->request->getVar('slugbg'));
        if($oldcaptionbg['captionbg'] == $this->request->getVar('captionbg'))
        {
            $rule_captionbg = 'required';
        }
        else
        {
            $rule_captionbg = 'required|is_unique[backgroundfloorplan.captionbg]';
        }
        if(!$this->validate([
            'captionbg'=>[
                'rules'=>$rule_captionbg,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'imagebg' => [
                    'rules'=>'max_size[imagebg,2048]|is_image[imagebg]|mime_in[imagebg,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                    ],
                    'titlebg'=>[
                        'rules'=>'required',
                        'errors'=>[
                            'required'=> 'title harus di isi , tidak boleh kosong',
                        ]
                        ],
                        'textb'=>[
                            'rules'=>'required',
                            'errors'=>[
                                'required'=> 'title harus di isi , tidak boleh kosong',
                            ]
                        ]
        ]))
        {
       
            return redirect()->to('/dashboardbgfloor/edit/' . $this->request->getVar('slugbg'))->withInput();
        }
        $fileimagebg = $this->request->getFile('imagebg');
        if($fileimagebg->getError() == 4)
        {
            $nameimagebg = $this->request->getVar('imagebglama');
        }else{
            $nameimagebg = $fileimagebg->getRandomName();
            $fileimagebg->move('assets/img/uploadbgfloor', $nameimagebg);
            unlink('assets/img/uploadbgfloor/' . $this->request->getVar('imagebglama'));
        }
        $slugbg = url_title($this->request->getVar('captionbg'), '-', true);
       $this->bgfloorModel->save([
           'id' => $id,
           'captionbg' => $this->request->getVar('captionbg'),
           'titlebg' => $this->request->getVar('titlebg'),
           'textb' => $this->request->getVar('textb'),
           'slugbg' => $slugbg,
           'imagebg' => $nameimagebg,
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardbgfloor');
    }



}
