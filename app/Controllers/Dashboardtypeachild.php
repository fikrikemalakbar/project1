<?php

namespace App\Controllers;
use App\Models\TypeachildModel;
use App\Controllers\BaseController;

class Dashboardtypeachild extends BaseController
{
    public function __construct()
    {
        $this->typeachildModel = new TypeachildModel();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [
            'title'=>'Dashboard Type A Child',
            'typeachild'=>$this->typeachildModel->getTypeachild()
        ];
        return view('dashboard/typeachild',$data);
    }

    public function detail($slugachild)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

       
       $data = [
           'title'=> 'Detail Type A child',
           'typeachild'=> $this->typeachildModel->getTypeachild($slugachild)
       ];

       if(empty($data['typeachild']))
       {
           throw new \CodeIgniter\Exceptions\PageNotFoundException('nama gambar '   .$slugachild   . ' tidak di temukan.');
       }

       return view('dashboard/detail/typeachild',$data);
    }

    
    public function create()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $data = [
            'title' => 'form create Type A Child',
            'validation'=> \Config\Services::validation()
        ];

        return view('dashboard/create/typeachild',$data);
    }

    public function save()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        if(!$this->validate([
            'achildimage' => [
                'rules'=>'max_size[achildimage,2048]|is_image[achildimage]|mime_in[achildimage,image/jpg,image/jpeg,image/png]',
                'errors'=>[
                    'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                    'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                    'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                ]
            ],
            'acaptionchild'=>[
                'rules'=>'required|is_unique[typeachildimage.acaptionchild]',
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
            ],

        ]))
        {
             return redirect()->to('/dashboardtypeachild/create')->withInput();

        }
        $achildimage = $this->request->getFile('achildimage');
        if($achildimage->getError() == 4)
        {
            $namaachildimage = 'blank.png';
        }
        else
        {
            $namaachildimage = $achildimage->getRandomName();
            $achildimage->move('assets/img/uploadtypeachild', $namaachildimage);
        }
        $slugachild = url_title($this->request->getVar('acaptionchild'), '-', true);
       $this->typeachildModel->save([
           'slugachild' => $slugachild,
           'achildimage' => $namaachildimage,
           'acaptionchild' => $this->request->getVar('acaptionchild'),
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di tambahkan');
       return redirect()->to('/dashboardtypeachild');
    }

    public function delete($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $typeachild = $this->typeachildModel->find($id);

        if($typeachild['achildimage'] != 'blank.png')
        {
            unlink('assets/img/uploadtypeachild/' . $typeachild['achildimage']);
        }

        $this->typeachildModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
        return redirect()->to('/dashboardtypeachild');
    }


    public function edit($slugachild)
    {
        $data = [
            'title' => 'form edit Type A child',
            'validation'=> \Config\Services::validation(),
            'typeachild' => $this->typeachildModel->getTypeachild($slugachild)
        ];

        return view('dashboard/edit/typeachild',$data);
    }
    public function update($id)
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
       
        $oldachildimage = $this->typeachildModel->getTypeachild($this->request->getVar('slugachild'));
        if($oldachildimage['acaptionchild'] == $this->request->getVar('acaptionchild'))
        {
            $rule_acaptionchild = 'required';
        }
        else
        {
            $rule_acaptionchild = 'required|is_unique[typeachildimage.acaptionchild]';
        }
        if(!$this->validate([
            'acaptionchild'=>[
                'rules'=>$rule_acaptionchild,
                'errors'=>[
                    'required'=> 'Caption harus di isi , tidak boleh kosong',
                    'is_unique'=> 'Caption sudah ada harus unique atau Caption sudah terdaftar'
                ]
                ],
                'achildimage' => [
                    'rules'=>'max_size[achildimage,2048]|is_image[achildimage]|mime_in[achildimage,image/jpg,image/jpeg,image/png]',
                    'errors'=>[
                        'max_size' => 'Ukuran Gambar terlalu besar , maximal 2048kb atau 2 mb',
                        'is_image' => 'ini bukan gambar,,harus extension PNG , JPG dan JPEG',
                        'mime_in'=> 'ini bukan gambar,harus extension PNG , JPG dan JPEG'
                    ]
                ],
        ]))
        {
       
            return redirect()->to('/dashboardtypeachild/edit/' . $this->request->getVar('slugachild'))->withInput();
        }
        $fileachildimage = $this->request->getFile('achildimage');
        if($fileachildimage->getError() == 4)
        {
            $nameachildimage = $this->request->getVar('oldachild');
        }else{
            $nameachildimage = $fileachildimage->getRandomName();
            $fileachildimage->move('assets/img/uploadtypeachild', $nameachildimage);
            unlink('assets/img/uploadtypeachild/' . $this->request->getVar('oldachild'));
        }
        $slugachild = url_title($this->request->getVar('acaptionchild'), '-', true);
       $this->typeachildModel->save([
           'id' => $id,
           'achildimage' => $nameachildimage,
           'acaptionchild' => $this->request->getVar('acaptionchild'),
           'slugfeature' => $slugachild,
       ]);
       session()->setFlashdata('pesan', 'Data Berhasil di Edit');
       return redirect()->to('/dashboardtypeachild');
    }




}
