<?php

namespace App\Controllers;
use App\Models\Feature;
use App\Controllers\BaseController;

class DashboardFeature extends BaseController
{
    protected $featureModel;
    public function __construct()
    {
        $this->featureModel = new feature();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        
        
        $data = [
            'title'=>'Dashboard feature',
            'feature'=>$this->featureModel->getFeature()
        ];

       
       

        return view('dashboard/feature',$data);
    }

    public function detail($slugfeature)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail feature',
           'feature'=> $this->featureModel->getFeature($slugfeature)
       ];

       if(empty($data['feature']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugfeature   . ' tidak di temukan.');
       }

       return view('dashboard/detail/feature',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create feature',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/feature',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'namefeature' => [
                'rules'=>'max_size[namefeature,1024]|is_image[namefeature]|mime_in[namefeature,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'altfeature'=>[
                'rules'=>'required|is_unique[feature.altfeature]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],
            'featuretext'=>[
                'rules'=>'required',
                'errors'=>[
                    'requireed'=>'Harus di isi'
                ]
            ]

        ]))
        {
             return redirect()->to('/dashboardfeature/create')->withInput();

        }
        $featureGambar = $this->request->getFile('namefeature');
        if($featureGambar->getError() == 4)
        {
            $namaFeatureGambar = 'blank.png';
        }
        else
        {
            $namaFeatureGambar = $featureGambar->getRandomName();
            $featureGambar->move('assets/img/uploadfeature', $namaFeatureGambar);
        }
        $slugfeature = url_title($this->request->getVar('altfeature'), '-', true);
       $this->featureModel->save([
           'slugfeature' => $slugfeature,
           'namefeature' => $namaFeatureGambar,
           'altfeature' => $this->request->getVar('altfeature'),
           'featuretext'=> $this->request->getVar('featuretext')
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardfeature');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $feature = $this->featureModel->find($id);

        if($feature['namefeature'] != 'blank.png')
        {
            unlink('assets/img/uploadfeature/' . $feature['namefeature']);
        }

        $this->featureModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardfeature');
    }
    public function edit($slugfeature)
    {
        $data = [
            'title' => 'form edit feature',
            'validation'=> \Config\Services::validation(),
            'feature' => $this->featureModel->getFeature($slugfeature)
        ];

        return view('dashboard/edit/feature',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldFeature = $this->featureModel->getFeature($this->request->getVar('slugfeature'));
        if($oldFeature['altfeature'] == $this->request->getVar('altfeature'))
        {
            $rule_altfeature = 'required';
        }
        else
        {
            $rule_altfeature = 'required|is_unique[feature.altfeature]';
        }
        if(!$this->validate([
            'altfeature'=>[
                'rules'=>$rule_altfeature,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'namefeature' => [
                    'rules'=>'max_size[namefeature,1024]|is_image[namefeature]|mime_in[namefeature,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 1024kb atau 1 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
                'featuretext'=>[
                    'rules'=>'required',
                    'errors'=>[
                        'required'=>'Wajib di isi tidak boleh kosong'
                    ]
                ]

        ]))
        {
       
            return redirect()->to('/dashboardfeature/edit/' . $this->request->getVar('slugfeature'))->withInput();
        }
        $fileUpload = $this->request->getFile('namefeature');
        if($fileUpload->getError() == 4)
        {
            $nameUpload = $this->request->getVar('imagefeaturelama');
        }else{
            $nameUpload = $fileUpload->getRandomName();
            $fileUpload->move('assets/img/upload', $nameUpload);
            unlink('assets/img/uploadfeature/' . $this->request->getVar('imagefeaturelama'));
        }
        $slugfeature = url_title($this->request->getVar('altfeature'), '-', true);
       $this->featureModel->save([
           'id' => $id,
           'namefeature' => $nameUpload,
           'altfeature' => $this->request->getVar('altfeature'),
           'slugfeature' => $slugfeature,
           'featuretext' => $this->request->getVar('featuretext'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardfeature');
    }
}
