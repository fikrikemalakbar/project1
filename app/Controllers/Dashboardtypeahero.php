<?php

namespace App\Controllers;
use App\Models\TypeaheroModel;
use App\Controllers\BaseController;

class Dashboardtypeahero extends BaseController
{
    public function __construct()
    {
        $this->typeaheroModel = new TypeaheroModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard Type A Hero',
            'typeahero'=>$this->typeaheroModel->getTypeahero()
        ];
        return view('dashboard/typeahero',$data);
    }

    public function detail($slugahero)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Type A Hero',
           'typeahero'=> $this->typeaheroModel->getTypeahero($slugahero)
       ];

       if(empty($data['typeahero']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugahero   . ' tidak di temukan.');
       }

       return view('dashboard/detail/typeahero',$data);
    }

    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Type A Hero',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typeahero',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'aheroimage' => [
                'rules'=>'max_size[aheroimage,2048]|is_image[aheroimage]|mime_in[aheroimage,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'acaptionhero'=>[
                'rules'=>'required|is_unique[typeaheroimage.acaptionhero]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardtypeahero/create')->withInput();

        }
        $aheroimage = $this->request->getFile('aheroimage');
        if($aheroimage->getError() == 4)
        {
            $namaaheroimage = 'blank.png';
        }
        else
        {
            $namaaheroimage = $aheroimage->getRandomName();
            $aheroimage->move('assets/img/uploadtypeahero', $namaaheroimage);
        }
        $slugahero = url_title($this->request->getVar('acaptionhero'), '-', true);
       $this->typeaheroModel->save([
           'slugahero' => $slugahero,
           'aheroimage' => $namaaheroimage,
           'acaptionhero' => $this->request->getVar('acaptionhero'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypeahero');
    }

    
    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $typeahero = $this->typeaheroModel->find($id);

        if($typeahero['aheroimage'] != 'blank.png')
        {
            unlink('assets/img/uploadtypeahero/' . $typeahero['aheroimage']);
        }

        $this->typeaheroModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypeahero');
    }

    public function edit($slugahero)
    {
        $data = [
            'title' => 'form edit Type A Hero',
            'validation'=> \Config\Services::validation(),
            'typeahero' => $this->typeaheroModel->getTypeahero($slugahero)
        ];

        return view('dashboard/edit/typeahero',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldaheroimage = $this->typeaheroModel->getTypeahero($this->request->getVar('slugahero'));
        if($oldaheroimage['acaptionhero'] == $this->request->getVar('acaptionhero'))
        {
            $rule_acaptionhero = 'required';
        }
        else
        {
            $rule_acaptionhero = 'required|is_unique[typeaheroimage.acaptionhero]';
        }
        if(!$this->validate([
            'acaptionhero'=>[
                'rules'=>$rule_acaptionhero,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'aheroimage' => [
                    'rules'=>'max_size[aheroimage,2048]|is_image[aheroimage]|mime_in[aheroimage,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardtypeahero/edit/' . $this->request->getVar('slugahero'))->withInput();
        }
        $fileaheroimage = $this->request->getFile('aheroimage');
        if($fileaheroimage->getError() == 4)
        {
            $nameaheroimage = $this->request->getVar('oldahero');
        }else{
            $nameaheroimage = $fileaheroimage->getRandomName();
            $fileaheroimage->move('assets/img/uploadtypeahero', $nameaheroimage);
            unlink('assets/img/uploadtypeahero/' . $this->request->getVar('oldahero'));
        }
        $slugahero = url_title($this->request->getVar('acaptionhero'), '-', true);
       $this->typeaheroModel->save([
           'id' => $id,
           'aheroimage' => $nameaheroimage,
           'acaptionhero' => $this->request->getVar('acaptionhero'),
           'slugfeature' => $slugahero,
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypeahero');
    }


    
}
