<?php

namespace App\Controllers;
use App\Models\Typea;
use App\Controllers\BaseController;

class Dashboardtypea extends BaseController
{
    public function __construct()
    {
        $this->typeaModel = new typea();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }    
        $data = [
            'title'=>'Dashboard Type A',
            'typea'=>$this->typeaModel->getTypea()
        ];
        return view('dashboard/typea',$data);
    }
    public function detail($slugtypea)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Type A',
           'typea'=> $this->typeaModel->getTypea($slugtypea)
       ];

       if(empty($data['typea']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugtypea   . ' tidak di temukan.');
       }

       return view('dashboard/detail/typea',$data);
    }
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create type a',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typea',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'heroimage' => [
                'rules'=>'max_size[heroimage,2048]|is_image[heroimage]|mime_in[heroimage,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionheroimagea'=>[
                'rules'=>'required|is_unique[typea.captionheroimagea]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimagesatu' => [
                'rules'=>'max_size[childimagesatu,2048]|is_image[childimagesatu]|mime_in[childimagesatu,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildimagesatua'=>[
                'rules'=>'required|is_unique[typea.captionchildimagesatua]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimagedua' => [
                'rules'=>'max_size[childimagedua,2048]|is_image[childimagedua]|mime_in[childimagedua,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildimageduaa'=>[
                'rules'=>'required|is_unique[typea.captionchildimageduaa]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
        ]))
        {
             return redirect()->to('/dashboardtypea/create')->withInput();

        }
        $hero = $this->request->getFile('heroimage');
        if($hero->getError() == 4)
        {
            $namahero = 'blank.png';
        }
        else
        {
            $namahero = $hero->getRandomName();
            $hero->move('assets/img/uploadtypea', $namahero);
        }
        $childsatua = $this->request->getFile('childimagesatu');
        if($childsatua->getError() == 4)
        {
            $namachildsatua = 'blank.png';
        }
        else
        {
            $namachildsatua = $childsatua->getRandomName();
            $childsatua->move('assets/img/uploadtypea', $namachildsatua);
        }
        $childduaa = $this->request->getFile('childimagedua');
        if($childduaa->getError() == 4)
        {
            $namachildduaa = 'blank.png';
        }
        else
        {
            $namachildduaa = $childduaa->getRandomName();
            $childduaa->move('assets/img/uploadtypea', $namachildduaa);
        }
        $slugtypea = url_title($this->request->getVar('captionheroimagea'), '-', true);
       $this->typeaModel->save([
           'heroimage' => $namahero,
           'captionheroimagea' => $this->request->getVar('captionheroimagea'),
           'childimagesatu' => $namachildsatua,
           'captionchildimagesatua' => $this->request->getVar('captionchildimagesatua'),
           'childimagedua' => $namachildduaa,
           'captionchildimageduaa' => $this->request->getVar('captionchildimageduaa'),
           'texttypea' => $this->request->getVar('texttypea'),
           'slugtypea' => $slugtypea
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypea');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $typea = $this->typeaModel->find($id);

        if($typea['heroimage'] != 'blank.png')
        {
            unlink('assets/img/uploadtypea/' . $typea['heroimage']);
        }

        if($typea['childimagesatu'] != 'blank.png')
        {
            unlink('assets/img/uploadtypea/' . $typea['childimagesatu']);
        }

        if($typea['childimagedua'] != 'blank.png')
        {
            unlink('assets/img/uploadtypea/' . $typea['childimagedua']);
        }

        $this->typeaModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypea');
    }

    public function edit($slugtypea)
    {
        $data = [
            'title' => 'form edit Type A',
            'validation'=> \Config\Services::validation(),
            'typea' => $this->typeaModel->getTypea($slugtypea)
        ];

        return view('dashboard/edit/typea',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldTypea = $this->typeaModel->getTypea($this->request->getVar('slugtypea'));
        if($oldTypea['captionheroimagea'] == $this->request->getVar('captionheroimagea'))
        {
            $rule_captionheroa = 'required';
        }
        else
        {
            $rule_captionheroa = 'required|is_unique[typea.captionheroimagea]';
        }

        // $oldTypeachildimagesatu = $this->typeaModel->getTypea($this->request->getVar('captionchildimagesatua'));
        if($this->request->getVar('captionchildimagesatua'))
        {
            $rule_captionchildimagesatu = 'required';
        }
        else
        {
            $rule_captionchildimagesatu = 'required|is_unique[typea.captionimagesatua]';
        }

        // $oldTypeachildimagedua = $this->typeaModel->getTypea($this->request->getVar('captionchildimageduaa'));
        if($this->request->getVar('captionchildimageduaa'))
        {
            $rule_captionchildimagedua = 'required';
        }
        else
        {
            $rule_captionchildimagedua = 'required|is_unique[typea.captionimageduaa]';
        }
        if(!$this->validate([
            'heroimage' => [
                'rules'=>'max_size[heroimage,2048]|is_image[heroimage]|mime_in[heroimage,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionheroimagea'=>[
                'rules'=>$rule_captionheroa,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimagesatu' => [
                'rules'=>'max_size[childimagesatu,2048]|is_image[childimagesatu]|mime_in[childimagesatu,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildimagesatua'=>[
                'rules'=>$rule_captionchildimagesatu,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimagedua' => [
                'rules'=>'max_size[childimagedua,2048]|is_image[childimagedua]|mime_in[childimagedua,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildimageduaa'=>[
                'rules'=>$rule_captionchildimagedua,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'texttypea'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'wajib di isi'
                ]
            ]
        ]))
        {
       
            return redirect()->to('/dashboardtypea/edit/' . $this->request->getVar('slugtypea'))->withInput();
        }
        $herofileupload = $this->request->getFile('heroimage');
        if($herofileupload->getError() == 4)
        {
            $nameheroimage = $this->request->getVar('heroimagelama');
        }else{
            $nameheroimage = $herofileupload->getRandomName();
            $herofileupload->move('assets/img/uploadtypea', $nameheroimage);
            unlink('assets/img/uploadtypea/' . $this->request->getVar('heroimagelama'));
        }

        $childimagesatu = $this->request->getFile('childimagesatu');
        if($childimagesatu->getError() == 4)
        {
            $namachildimagesatu = $this->request->getVar('childimagesatulama');
        }else{
            $namachildimagesatu = $childimagesatu->getRandomName();
            $childimagesatu->move('assets/img/uploadtypea', $namachildimagesatu);
            unlink('assets/img/uploadtypea/' . $this->request->getVar('childimagesatulama'));
        }
        $childimagedua = $this->request->getFile('childimagedua');
        if($childimagedua->getError() == 4)
        {
            $namachildimagedua = $this->request->getVar('childimagedualama');
        }else{
            $namachildimagedua = $childimagedua->getRandomName();
            $childimagedua->move('assets/img/uploadtypea', $namachildimagedua);
            unlink('assets/img/uploadtypea/' . $this->request->getVar('childimagedualama'));
        }
        $slugtypea = url_title($this->request->getVar('captionheroimagea'), '-', true);
       $this->typeaModel->save([
           'id' => $id,
           'heroimage' => $nameheroimage,
           'captionheroimagea' => $this->request->getVar('captionheroimagea'),
           'childimagesatu' => $namachildimagesatu,
           'captionchildimagesatua' => $this->request->getVar('captionchildimagesatua'),
           'childimagedua' => $namachildimagedua,
           'captionchildimageduaa' => $this->request->getVar('captionchildimageduaa'),
           'texttypea' => $this->request->getVar('texttypea'),
           'slug' => $slugtypea
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypea');
    }

}
