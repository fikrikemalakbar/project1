<?php

namespace App\Controllers;
use App\Models\Typeb;
use App\Controllers\BaseController;

class Dashboardtypeb extends BaseController
{
    public function __construct()
    {
        $this->typebModel = new typeb();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }    
        $data = [
            'title'=>'Dashboard Type B',
            'typeb'=>$this->typebModel->getTypeb()
        ];
        return view('dashboard/typeb',$data);
    }
    public function detail($slugtypeb)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Type B',
           'typeb'=> $this->typebModel->getTypeb($slugtypeb)
       ];

       if(empty($data['typeb']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugtypeb   . ' tidak di temukan.');
       }

       return view('dashboard/detail/typeb',$data);
    }
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create type B',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typeb',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'heroimagetypeb' => [
                'rules'=>'max_size[heroimagetypeb,2048]|is_image[heroimagetypeb]|mime_in[heroimagetypeb,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionheroimageb'=>[
                'rules'=>'required|is_unique[typeb.captionheroimageb]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimagesatutypeb' => [
                'rules'=>'max_size[childimagesatutypeb,2048]|is_image[childimagesatutypeb]|mime_in[childimagesatutypeb,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildsatuimageb'=>[
                'rules'=>'required|is_unique[typeb.captionchildsatuimageb]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimageduatypeb' => [
                'rules'=>'max_size[childimageduatypeb,2048]|is_image[childimageduatypeb]|mime_in[childimageduatypeb,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildduaimageb'=>[
                'rules'=>'required|is_unique[typeb.captionchildduaimageb]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'texttypeb'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'wajib di isi'
                ]
            ]
        ]))
        {
             return redirect()->to('/dashboardtypeb/create')->withInput();

        }
        $herocreateb = $this->request->getFile('heroimagetypeb');
        if($herocreateb->getError() == 4)
        {
            $namaherocreateb = 'blank.png';
        }
        else
        {
            $namaherocreateb = $herocreateb->getRandomName();
            $herocreateb->move('assets/img/uploadtypeb', $namaherocreateb);
        }
        $chilsatucreateb = $this->request->getFile('childimagesatutypeb');
        if($chilsatucreateb->getError() == 4)
        {
            $namachildsatucreateb = 'blank.png';
        }
        else
        {
            $namachildsatucreateb = $chilsatucreateb->getRandomName();
            $chilsatucreateb->move('assets/img/uploadtypeb', $namachildsatucreateb);
        }
        $childduacreateb = $this->request->getFile('childimageduatypeb');
        if($childduacreateb->getError() == 4)
        {
            $namachildduacreateb = 'blank.png';
        }
        else
        {
            $namachildduacreateb = $childduacreateb->getRandomName();
            $childduacreateb->move('assets/img/uploadtypeb', $namachildduacreateb);
        }
        $slugtypeb = url_title($this->request->getVar('captionheroimageb'), '-', true);
       $this->typebModel->save([
           'heroimagetypeb' => $namaherocreateb,
           'captionheroimageb' => $this->request->getVar('captionheroimageb'),
           'childimagesatutypeb' => $namachildsatucreateb,
           'captionchildsatuimageb' => $this->request->getVar('captionchildsatuimageb'),
           'childimageduatypeb' => $namachildduacreateb,
           'captionchildduaimageb' => $this->request->getVar('captionchildduaimageb'),
           'texttypeb' => $this->request->getVar('texttypeb'),
           'slugtypeb' => $slugtypeb
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypeb');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $typeb = $this->typebModel->find($id);

        if($typeb['heroimagetypeb'] != 'blank.png')
        {
            unlink('assets/img/uploadtypeb/' . $typeb['heroimagetypeb']);
        }

        if($typeb['childimagesatutypeb'] != 'blank.png')
        {
            unlink('assets/img/uploadtypeb/' . $typeb['childimagesatutypeb']);
        }

        if($typeb['childimageduatypeb'] != 'blank.png')
        {
            unlink('assets/img/uploadtypeb/' . $typeb['childimageduatypeb']);
        }

        $this->typebModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypeb');
    }

    public function edit($slugtypeb)
    {
        $data = [
            'title' => 'form edit Type A',
            'validation'=> \Config\Services::validation(),
            'typeb' => $this->typebModel->getTypeb($slugtypeb)
        ];

        return view('dashboard/edit/typeb',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldTypeb = $this->typebModel->getTypeb($this->request->getVar('slugtypeb'));
        if($oldTypeb['captionheroimageb'] == $this->request->getVar('captionheroimageb'))
        {
            $rule_captionherob = 'required';
        }
        else
        {
            $rule_captionherob = 'required|is_unique[typeb.captionheroimageb]';
        }

       
        if($this->request->getVar('captionchildsatuimageb'))
        {
            $rule_captionchildsatuimageb = 'required';
        }
        else
        {
            $rule_captionchildsatuimageb = 'required|is_unique[typeb.captionchildsatuimageb]';
        }

       
        if($this->request->getVar('captionchildduaimageb'))
        {
            $rule_captionchildduaimageb = 'required';
        }
        else
        {
            $rule_captionchildduaimageb = 'required|is_unique[typeb.captionchildduaimageb]';
        }
        if(!$this->validate([
            'heroimagetypeb' => [
                'rules'=>'max_size[heroimagetypeb,2048]|is_image[heroimagetypeb]|mime_in[heroimagetypeb,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionheroimageb'=>[
                'rules'=>$rule_captionherob,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimagesatutypeb' => [
                'rules'=>'max_size[childimagesatutypeb,2048]|is_image[childimagesatutypeb]|mime_in[childimagesatutypeb,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildsatuimageb'=>[
                'rules'=>$rule_captionchildsatuimageb,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'childimageduatypeb' => [
                'rules'=>'max_size[childimageduatypeb,2048]|is_image[childimageduatypeb]|mime_in[childimageduatypeb,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionchildduaimageb'=>[
                'rules'=> $rule_captionchildduaimageb,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'texttypeb'=>[
                'rules'=>'required',
                'errors'=>[
                    'required'=>'wajib di isi'
                ]
            ]
        ]))
        {
       
            return redirect()->to('/dashboardtypeb/edit/' . $this->request->getVar('slugtypeb'))->withInput();
        }
        $heroimageb = $this->request->getFile('heroimagetypeb');
        if($heroimageb->getError() == 4)
        {
           $nameheroimageb = $this->request->getVar('hlm');
        }else{
           $nameheroimageb = $heroimageb->getRandomName();
            $heroimageb->move('assets/img/uploadtypeb',$nameheroimageb);
            unlink('assets/img/uploadtypeb/' . $this->request->getVar('hlm'));
        }

        $childimagesatub = $this->request->getFile('childimagesatutypeb');
        if($childimagesatub->getError() == 4)
        {
           $namachildsatub = $this->request->getVar('clsdb');
        }else{
           $namachildsatub = $childimagesatub->getRandomName();
            $childimagesatub->move('assets/img/uploadtypeb',$namachildsatub);
            unlink('assets/img/uploadtypeb/' . $this->request->getVar('clsdb'));
        }
        $childimageduab = $this->request->getFile('childimageduatypeb');
        if($childimageduab->getError() == 4)
        {
            $namachildduab = $this->request->getVar('clssb');
        }else{
            $namachildduab = $childimageduab->getRandomName();
            $childimageduab->move('assets/img/uploadtypeb', $namachildduab);
            unlink('assets/img/uploadtypeb/' . $this->request->getVar('clssb'));
        }
        $slugtypeb = url_title($this->request->getVar('captionheroimageb'), '-', true);
       $this->typebModel->save([
           'id' => $id,
           'heroimagetypeb' =>$nameheroimageb,
           'captionheroimageb' => $this->request->getVar('captionheroimageb'),
           'childimagesatutypeb' =>$namachildsatub,
           'captionchildsatuimageb' => $this->request->getVar('captionchildsatuimageb'),
           'childimageduatypeb' => $namachildduab,
           'captionchildduaimageb' => $this->request->getVar('captionchildduaimageb'),
           'texttypeb' => $this->request->getVar('texttypeb'),
           'slugtypeb' => $slugtypeb
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypeb');
    }

}
