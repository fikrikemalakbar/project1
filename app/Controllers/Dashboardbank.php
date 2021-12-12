<?php

namespace App\Controllers;
use App\Models\BankModel;
use App\Controllers\BaseController;

class Dashboardbank extends BaseController
{
    public function __construct()
    {
        $this->bankModel = new BankModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard bank',
            'bank'=>$this->bankModel->getbank()
        ];
        return view('dashboard/bank',$data);
    }

    
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create bank',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/bank',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imagebank' => [
                'rules'=>'max_size[imagebank,1024]|is_image[imagebank]|mime_in[imagebank,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionbank'=>[
                'rules'=>'required|is_unique[bank.captionbank]',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'caption sudah ada harus unique atau link sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardbank/create')->withInput();

        }
        $imagebank = $this->request->getFile('imagebank');
        if($imagebank->getError() == 4)
        {
            $namaimagebank = 'blank.png';
        }
        else
        {
            $namaimagebank = $imagebank->getRandomName();
            $imagebank->move('assets/img/upload', $namaimagebank);
        }

      
      
       $this->bankModel->save([
           'id' => $this->request->getVar('id'),
           'imagebank' => $namaimagebank,
           'captionbank' => $this->request->getVar('captionbank'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardbank');
    }

    
    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $bank = $this->bankModel->find($id);

        if($bank['imagebank'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $bank['imagebank']);
        }
        $this->bankModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardbank');
    }

    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit Site Plan',
            'validation'=> \Config\Services::validation(),
            'bank' => $this->bankModel->getbank($id)
        ];

        return view('dashboard/edit/bank',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $captionbanklama = $this->bankModel->getbank($this->request->getVar('idbanklama'));
        if($captionbanklama['captionbank'] == $this->request->getVar('captionbank'))
        {
            $rule_captionbank = 'required';
        }
        else
        {
            $rule_captionbank = 'required|is_unique[bank.captionbank]';
        }
        if(!$this->validate([
            'captionbank'=>[
                'rules'=>$rule_captionbank,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'imagebank' => [
                    'rules'=>'max_size[imagebank,1024]|is_image[imagebank]|mime_in[imagebank,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardbank/edit/' . $this->request->getVar('id'))->withInput();
        }
        $fileimagebank = $this->request->getFile('imagebank');
        if($fileimagebank->getError() == 4)
        {
            $namaimagebank = $this->request->getVar('oldimagebank');
        }else{
            $namaimagebank = $fileimagebank->getRandomName();
            $fileimagebank->move('assets/img/upload', $namaimagebank);
            unlink('assets/img/upload/' . $this->request->getVar('oldimagebank'));
        }
        
       $this->bankModel->save([
           'id' => $id,
           'imagebank' => $namaimagebank,
           'captionbank' => $this->request->getVar('captionbank'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardbank');
    }
}
