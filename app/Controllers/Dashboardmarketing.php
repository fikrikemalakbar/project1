<?php

namespace App\Controllers;
use App\Models\MarketingModel;
use App\Controllers\BaseController;

class Dashboardmarketing extends BaseController
{
    public function __construct()
    {
        $this->marketingModel = new MarketingModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard Marketing',
            'marketing'=>$this->marketingModel->getmarketing()
        ];
        return view('dashboard/marketing',$data);
    }

    
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Marketing',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/marketing',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'imagemarketing' => [
                'rules'=>'max_size[imagemarketing,1024]|is_image[imagemarketing]|mime_in[imagemarketing,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'captionmarketing'=>[
                'rules'=>'required|is_unique[marketing.captionmarketing]',
                'errors'=>[
                    'required'=> 'caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'caption sudah ada harus unique atau link sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardmarketing/create')->withInput();

        }
        $imagemarketing = $this->request->getFile('imagemarketing');
        if($imagemarketing->getError() == 4)
        {
            $namaimagemarketing = 'blank.png';
        }
        else
        {
            $namaimagemarketing = $imagemarketing->getRandomName();
            $imagemarketing->move('assets/img/upload', $namaimagemarketing);
        }

      
      
       $this->marketingModel->save([
           'id' => $this->request->getVar('id'),
           'imagemarketing' => $namaimagemarketing,
           'captionmarketing' => $this->request->getVar('captionmarketing'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardmarketing');
    }

    
    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $marketing = $this->marketingModel->find($id);

        if($marketing['imagemarketing'] != 'blank.png')
        {
            unlink('assets/img/upload/' . $marketing['imagemarketing']);
        }
        $this->marketingModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardmarketing');
    }

    
    public function edit($id)
    {
        $data = [
            'title' => 'form edit Site Plan',
            'validation'=> \Config\Services::validation(),
            'marketing' => $this->marketingModel->getmarketing($id)
        ];

        return view('dashboard/edit/marketing',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $captionmarketinglama = $this->marketingModel->getmarketing($this->request->getVar('idmarketinglama'));
        if($captionmarketinglama['captionmarketing'] == $this->request->getVar('captionmarketing'))
        {
            $rule_captionmarketing = 'required';
        }
        else
        {
            $rule_captionmarketing = 'required|is_unique[marketing.captionmarketing]';
        }
        if(!$this->validate([
            'captionmarketing'=>[
                'rules'=>$rule_captionmarketing,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'imagemarketing' => [
                    'rules'=>'max_size[imagemarketing,1024]|is_image[imagemarketing]|mime_in[imagemarketing,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardmarketing/edit/' . $this->request->getVar('id'))->withInput();
        }
        $fileimagemarketing = $this->request->getFile('imagemarketing');
        if($fileimagemarketing->getError() == 4)
        {
            $namaimagemarketing = $this->request->getVar('oldimagemarketing');
        }else{
            $namaimagemarketing = $fileimagemarketing->getRandomName();
            $fileimagemarketing->move('assets/img/upload', $namaimagemarketing);
            unlink('assets/img/upload/' . $this->request->getVar('oldimagemarketing'));
        }
        
       $this->marketingModel->save([
           'id' => $id,
           'imagemarketing' => $namaimagemarketing,
           'captionmarketing' => $this->request->getVar('captionmarketing'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardmarketing');
    }





}
