<?php

namespace App\Controllers;
use App\Models\SiteplanModel;
use App\Controllers\BaseController;

class Dashboardsiteplan extends BaseController
{
    public function __construct()
    {
        $this->siteplanModel = new SiteplanModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard Site Plan',
            'siteplan'=>$this->siteplanModel->getsiteplan()
        ];
        return view('dashboard/siteplan',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Site Plan',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/siteplan',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imagemaps' => [
                'rules'=>'max_size[imagemaps,1024]|is_image[imagemaps]|mime_in[imagemaps,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'imagesite' => [
                'rules'=>'max_size[imagesite,1024]|is_image[imagesite]|mime_in[imagesite,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionsite'=>[
                'rules'=>'required|is_unique[siteplan.captionsite]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'captionmaps'=>[
                'rules'=>'required|is_unique[siteplan.captionmaps]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'title'=>[
                'rules'=>'required|is_unique[siteplan.title]',
                'errors'=>[
                    'required'=> 'link harus di isi , tidak boleh kosong',
                    'is_unique'=> 'link sudah ada harus unique atau link sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardsiteplan/create')->withInput();

        }
        $imagesite = $this->request->getFile('imagesite');
        if($imagesite->getError() == 4)
        {
            $namaimagesite = 'blank.png';
        }
        else
        {
            $namaimagesite = $imagesite->getRandomName();
            $imagesite->move('assets/img/upload', $namaimagesite);
        }

        $imagemaps = $this->request->getFile('imagemaps');
        if($imagemaps->getError() == 4)
        {
            $namaimagemaps = 'blank.png';
        }
        else
        {
            $namaimagemaps = $imagemaps->getRandomName();
            $imagemaps->move('assets/img/upload', $namaimagemaps);
        }
      
      
       $this->siteplanModel->save([
           'id' => $this->request->getVar('id'),
           'imagesite' => $namaimagesite,
           'captionsite' => $this->request->getVar('captionsite'),
           'imagemaps' => $namaimagemaps,
           'captionmaps' => $this->request->getVar('captionmaps'),
           'title' => $this->request->getVar('title'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardsiteplan');
    }


    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $siteplan = $this->siteplanModel->find($id);

        if($siteplan['imagesite'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $siteplan['imagesite']);
        }


        if($siteplan['imagemaps'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $siteplan['imagemaps']);
        }

        $this->siteplanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardsiteplan');
    }


    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit Site Plan',
            'validation'=> \Config\Services::validation(),
            'siteplan' => $this->siteplanModel->getsiteplan($id)
        ];

        return view('dashboard/edit/siteplan',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $captionsitelama = $this->siteplanModel->getsiteplan($this->request->getVar('idsiteplanlama'));
        if($captionsitelama['captionsite'] == $this->request->getVar('captionsite'))
        {
            $rule_captionsite = 'required';
        }
        else
        {
            $rule_captionsite = 'required|is_unique[siteplan.captionsite]';
        }
        $captionmapslama = $this->siteplanModel->getsiteplan($this->request->getVar('idsiteplanlama'));
        if($captionmapslama['captionmaps'] == $this->request->getVar('captionmaps'))
        {
            $rule_captionmaps = 'required';
        }
        else
        {
            $rule_captionmaps = 'required|is_unique[siteplan.captionmaps]';
        }
        $titlelama = $this->siteplanModel->getsiteplan($this->request->getVar('idsiteplanlama'));
        if($titlelama['title'] == $this->request->getVar('title'))
        {
            $rule_title = 'required';
        }
        else
        {
            $rule_title = 'required|is_unique[siteplan.title]';
        }
        if(!$this->validate([
            'captionsite'=>[
                'rules'=>$rule_captionsite,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'captionmaps'=>[
                    'rules'=>$rule_captionmaps,
                    'errors'=>[
                        'required'=> 'Caption harus di isi , tidak boleh kosong',
                        'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                    ]
                    ],
                    'title'=>[
                        'rules'=>$rule_title,
                        'errors'=>[
                            'required'=> 'link harus di isi , tidak boleh kosong',
                            'is_unique'=> 'link sudah ada harus unique atau link sudah terdaftar'
                        ]
                        ],
                'imagesite' => [
                    'rules'=>'max_size[imagesite,1024]|is_image[imagesite]|mime_in[imagesite,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
                'imagemaps' => [
                    'rules'=>'max_size[imagemaps,1024]|is_image[imagemaps]|mime_in[imagemaps,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardsiteplan/edit/' . $this->request->getVar('id'))->withInput();
        }
        $fileimagemaps = $this->request->getFile('imagemaps');
        if($fileimagemaps->getError() == 4)
        {
            $namaimagemaps = $this->request->getVar('oldimagemaps');
        }else{
            $namaimagemaps = $fileimagemaps->getRandomName();
            $fileimagemaps->move('assets/img/upload', $namaimagemaps);
            unlink('assets/img/upload/' . $this->request->getVar('oldimagemaps'));
        }
        $fileimagesite = $this->request->getFile('imagesite');
        if($fileimagesite->getError() == 4)
        {
            $namaimagesite = $this->request->getVar('oldimagesite');
        }else{
            $namaimagesite = $fileimagesite->getRandomName();
            $fileimagesite->move('assets/img/upload', $namaimagesite);
            unlink('assets/img/upload/' . $this->request->getVar('oldimagesite'));
        }
       $this->siteplanModel->save([
           'id' => $id,
           'imagemaps' => $namaimagemaps,
           'imagesite' => $namaimagesite,
           'captionsite' => $this->request->getVar('captionsite'),
           'captionmaps' => $this->request->getVar('captionmaps'),
           'title' => $this->request->getVar('title'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardsiteplan');
    }

}
