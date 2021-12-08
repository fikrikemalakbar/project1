<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegisterModel;

class Register extends BaseController
{
    public $registerModel;
    public $session;
    public $email;
    public function __construct()
    {
       
        helper('form');
        helper('date');
        $this->registerModel = new RegisterModel();
        $this->session = \Config\Services::session();
        $this->email =  \Config\Services::email();
    }
    public function index()
    {
        $data = [];
        $data['title'] = 'Register';
        $data['validation'] = null;
        if ($this->request->getMethod() == 'post')
        {
            $rules = [
                'name'=> 'required|max_length[40]',
                'email'=>'required|valid_email|is_unique[users.email]',
                'pass' =>'required|min_length[8]|max_length[50]',
                'cpass'=>'required|matches[pass]'
            ];
            if($this->validate($rules)){
                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
                $userdata = [
                    'name'=> $this->request->getVar('name', FILTER_SANITIZE_STRING),
                    'email'=> $this->request->getVar('email'),
                    'password'=> password_hash($this->request->getVar('pass'),PASSWORD_DEFAULT),
                    'uniid' => $uniid,
                    'activation_date' => date("Y-m-d h:i:s")
                ];
                if($this->registerModel->createUser($userdata))
                {
                    $to = $this->request->getVar('email');
                    $subject = 'Activation Account';
                    $message = 'Hi '.$this->request->getVar('name', FILTER_SANITIZE_STRING).",<br><br>Thanks Account created". "succesfully. please click the below link to activation your account<br><br>". "<a href='".base_url()."/register/activate/".$uniid."' target='_blank'>Activate Now</a><br><br>Thanks";
                    $email = \Config\Services::email();
                    // $email->setBCC('exampbcc@mail.com');
                    // $email->setCC('exampcc@gmail.com');
                 
                    $this->email->setTo($to);
                    $email->setFrom('info@mail.com','info');
                    $this->email->setSubject($subject);
                    $this->email->setMessage($message);
                    $filepath ='public/assets/img/newsapi.png';
                    $this->email->attach($filepath);
                    if($this->email->send())
                    {
                       
                        $this->session->setTempdata('success', 'Account create Activation, please Activation yout account',3);
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'Account create Activation, sorry! unable to send activation link. please contact admin',3);
                        return redirect()->to(current_url());
                       //$data = $this->email->printDebugger(['headers']);
                        //print_r($data);
                    }

                    

                }
                else{
                    $this->session->setTempdata('error', 'soory! unable to create an account and try again',3);
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        return view ('register/index',$data);
    }
    public function activate($uniid=null)
    {
        $data = [];
        $data['title'] = 'activate';
        if(!empty($uniid))
        {
            $userdata = $this->registerModel->verifyUniid($uniid);
            if($userdata)
            {
                if($this->verifyExpiryTime($userdata->activation_date))
                {
                    if($userdata->status == 'inactive')
                    {
                        $status = $this->registerModel->updateStatus($uniid);
                        if($status == true)
                        {
                            $data['success'] = 'Account Activated succesfully'.'please <a href="/login">login</a>';
                        }
                    }
                    else
                    {
                        $data['Success'] = 'your account is already activate';
                    }
                }
                else
                {
                    $data['error'] = 'sorry! activation link was expired';
                }
            }
            else
            {
                $data['error'] = 'sorry! we are unable find to your account';
            }
        }
        else
        {
            $data['error'] = 'sorry! unable to process you request ';
        }
        return view("register/activate",$data);
    }
    public function verifyExpiryTime($regTime)
    {
        $currTime = now();
        $regtime = strtotime($regTime);
        $diffTIme = (int)$currTime - (int)$regTime;
        if(3600 < $diffTIme)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
