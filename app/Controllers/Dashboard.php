<?php

namespace App\Controllers;
use App\Models\DashboardModel;
use App\Models\Gallery;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public $dModel;
    protected $galleryModel;
    public function __construct()
    {
        helper('form');
        $this->dModel = new DashboardModel();
        $this->galleryModel = new Gallery();
    }
    public function index()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $uniid = session()->get('logged_user');
        $data['userdata'] = $this->dModel->getLoggedInUserData($uniid);
        $data['title'] = 'Root Dashboard';
    
        return view('dashboard/index',$data);
    }
    public function logout()
    {
        if(session()->has('logged_info'))
        {
            $la_id = session()->get('logged_info');
            $this->dModel->updateLogoutTIme($la_id);
        }
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url()."/login");
    }

    public function loginactivity()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }

        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        $data['login_info'] = $this->dModel->getLoginUserInfo(session()->get('logged_user'));
        $data['title'] = 'Login Activity';
     
        return view('dashboard/login_activity',$data);
    }
   
    public function editprofil()
    {
        if(!session()->has('logged_user'))
        {
            return redirect()->to(base_url()."/login");
        }
        $data = [];
        $data['title'] = 'Edit Profil';
        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));
        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,jpg,png,gif,jpeg]',
            ];
            if($this->validate($rules))
            {
                $file = $this->request->getFile('avatar');
                if($file->isValid() && !$file->hasMoved())
                {
                    // if($file->move(FCPATH.'public\assets\img\upload',$file->getRandomName()))
                    if($file->move(FCPATH.'upload',$file->getRandomName()))
                    {
                        // $path = base_url().'/public/assets/img/upload'.$file->getName();
                        $path = base_url().'/upload/'.$file->getName();
                        $status = $this->dModel->updateAvatar($path,session()->get('logged_user'));
                        if($status == true)
                        {
                            session()->setTempData('success','your pic has been change',3);
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            session()->setTempData('error','sorry! unable to uploaded this pic',3);
                            return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        session()->setTempData('error',$file->getErrorString(),3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    session()->setTempData('error','you have uploaded in valid file',3);
                        return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
          
           
        }
    
        return view('dashboard/editprofil',$data);
    }

    public function changepassword()
    {
        
        $data = [];
        $data['title'] = 'Change Password';
        $data['userdata'] = $this->dModel->getLoggedInUserData(session()->get('logged_user'));

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'opwd' => 'required',
                'npwd' =>'required|min_length[8]|max_length[50]',
                'cnpwd' =>'required|matches[npwd]'
            ];
            if($this->validate($rules))
            {
                $opwd = $this->request->getVar('opwd');
                $npwd = $this->request->getVar('npwd');

                if(password_verify($npwd,$data['userdata']->password))
                {

                }
                else
                {
                    session()->setTempdata('error','old password worng',3);
                    redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        
        return view('dashboard/change_password',$data);
    }
   
}
