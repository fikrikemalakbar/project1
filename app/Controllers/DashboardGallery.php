<?php

namespace App\Controllers;
use App\Models\Gallery;
use App\Controllers\BaseController;

class DashboardGallery extends BaseController
{
    protected $galleryModel;
    public function __construct()
    {
        $this->galleryModel = new Gallery();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        
        
        $data = [
            'title'=>'Dashboard Gallery',
            'gallery'=>$this->galleryModel->getGallery()
        ];

       
       

        return view('dashboard/gallery',$data);
    }

    public function detail($slug)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Galler',
           'gallery'=> $this->galleryModel->getGallery($slug)
       ];

       if(empty($data['gallery']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slug   . ' tidak di temukan.');
       }

       return view('dashboard/detail/gallery',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create gallery',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/gallery',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'name' => [
                'rules'=>'max_size[name,1024]|is_image[name]|mime_in[name,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'alt'=>[
                'rules'=>'required|is_unique[gallery.alt]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ]
        ]))
        {
             return redirect()->to('/dashboardgallery/create')->withInput();

        }
        $galleryGambar = $this->request->getFile('name');
        if($galleryGambar->getError() == 4)
        {
            $namaGambar = 'blank.png';
        }
        else
        {
            $namaGambar = $galleryGambar->getRandomName();
            $galleryGambar->move('assets/img/upload', $namaGambar);
        }
        $slug = url_title($this->request->getVar('alt'), '-', true);
       $this->galleryModel->save([
           'slug' => $slug,
           'name' => $namaGambar,
           'alt' => $this->request->getVar('alt'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardgallery');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $gallery = $this->galleryModel->find($id);

        if($gallery['name'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $gallery['name']);
        }

        $this->galleryModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardgallery');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'form edit gallery',
            'validation'=> \Config\Services::validation(),
            'gallery' => $this->galleryModel->getGallery($slug)
        ];

        return view('dashboard/edit/gallery',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldGallery = $this->galleryModel->getGallery($this->request->getVar('slug'));
        if($oldGallery == $this->request->getVar('alt'))
        {
            $rule_alt = 'required';
        }
        else
        {
            $rule_alt = 'required|is_unique[gallery.alt]';
        }
        if(!$this->validate([
            'name' => [
                'rules'=>'max_size[name,1024]|is_image[name]|mime_in[name,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'alt'=>[
                'rules'=>$rule_alt,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ]
        ]))
        {
            $validation = \Config\Services::validation();
            return redirect()->to('/dashboardgallery/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $fileUpload = $this->request->getFile('name');
        if($fileUpload->getError() == 4)
        {
            $nameUpload = $this->request->getVar('oldname');
        }else{
            $nameUpload = $fileUpload->getRandomName();
            $fileUpload->move('assets/img/upload', $nameUpload);
            unlink('assets/img/upload/' . $this->request->getVar('oldName'));
        }
        $slug = url_title($this->request->getVar('alt'), '-', true);
       $this->galleryModel->save([
           'id' => $id,
           'slug' => $slug,
           'name' => $nameUpload,
           'alt' => $this->request->getVar('alt'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardgallery');
    }
}
