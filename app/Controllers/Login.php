<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use CodeIgniter\Controller;
class Login extends BaseController
{
    public $loginModel;
    public $session;
    public function __construct()
    {
        helper('form');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }
    public function index()
    {
        $data = [];
        $data['title'] = 'login';
        if($this->request->getPost())
        // if ($this->request->getMethod() == 'post')
        {
            $rules = [
                'email'=>'required|valid_email',
                'pass' =>'required|min_length[8]|max_length[50]',
            ];
            if($this->validate($rules))
            {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('pass');

               $userdata =  $this->loginModel->verifyEmail($email);
               if($userdata)
               {
                   if(password_verify($password, $userdata["password"]))
                   {
                       if($userdata['status']=='active')
                       {
                           $loginInfo = [
                                'uniid'=> $userdata['uniid'],
                                'agent' => $this->getUserAgentInfo(),
                                'ip' => $this->request->getIPAddress(),
                                'login_time'=> date('Y-m-d h:i:s'),
                                
                           ];
                           $la_id = $this->loginModel->saveLoginInfo($loginInfo);
                           if($la_id)
                           {
                            $this->session->set('logged_user',$userdata['uniid']);
                           }

                            $this->session->set('logged_info',$la_id);
                            return redirect()->to(base_url().'/dashboard');
                       }
                       else 
                       {
                        $this->session->setTempdata('error', 'please activate your account or contact admin',3);
                        return redirect()->to(current_url());
                       }
                   }
                   else
                   {
                    $this->session->setTempdata('error', 'sorry! email or password wrong',3);
                    return redirect()->to(current_url());
                   }
               }
               else
               {
                   $this->session->setTempdata('error', 'sorry! Email does not exist',3);
                   return redirect()->to(current_url());
               }

            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        return view('login/index', $data);
    }

    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if($agent->isBrowser())
        {
            $currentAgent = $agent->getBrowser();
        }
        elseif ($agent->isRobot())
        {
            $currentAgent = $this->agent->robot();
        }
        elseif($agent->isMobile())
        {
            $currentAgent = $agent->getMobile();
        }
        else
        {
            $currentAgent = 'Ubdefinded User Agent';
        }
        return $currentAgent;
    }

    public function forgotpassword()
    {
        $data=[];
        $data['title'] = 'Forgot Password';
        if($this->request->getMethod() == 'post')
        {
            $rules=[
                'email'=>[
                    'label'=>'Email',
                    'rules'=>'required|valid_email',
                    'errors' => [
                        'required'=>'{field} field required',
                        'valid_email' => 'valid {field} required'
                    ]
                ]
            ];
            if($this->validate($rules))
            {
                $email = $this->request->getVar('email',FILTER_SANITIZE_EMAIL);
                $userdata = $this->loginModel->verifyEmail($email);
                if(!empty($userdata))
                {
                    if($this->loginModel->updatedAt($userdata['uniid']))
                    {
                        $to = $email;
                        $subject = 'Reset Password';
                        $token = $userdata['uniid'];

                        $message = 'Hi '.$userdata['name'].'<br><br>'.'your request password has been received'.'please click link the below to reset your password. <br><br>'. '<a href="'. base_url() .'/login/resetpassword/'.$token.'">click</a>';
                        $email = \Config\Services::email();
                        $email->setFrom('info@mail.com','info');
                        $email->setTo($to);
                        $email->setSubject($subject);
                        $email->setMessage($message);
                        $filepath ='public/assets/img/newsapi.png';
                        $email->attach($filepath);
                        if($email->send())
                        {
                            $this->session->setTempdata('success', 'chears',3);
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    }
                    else
                    {
                        $this->session->setTempdata('error', 'sorry! Unable to jpdate, please try again',3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    $this->session->setTempdata('error', 'sorry! Email does not exist',3);
                    return redirect()->to(current_url());
                }
                
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }
        return view('login/forgot_password',$data);
    }



    public function resetpassword($token=null)
    {
        $data = [];
        if(!empty($token))
        {
            $userdata = $this->loginModel->verifyToken($token);
            if(!empty($userdata))
            {
                if($this->checkExpiryDate($userdata['update_at']))
                {
                    if($this->request->getMethod() == 'post')
                    {
                        $rules = [
                            'pwd'=>[
                                'label' => 'password',
                                'rules' => 'required|min_length[8]|max_length[50]'
                            ],
                            'cpwd'=>[
                                'label'=>'Confirm Password',
                                'rules'=>'required|matches[pwd]'
                            ],
                        ];

                        if($this->validate($rules))
                        {
                            $pwd = password_hash($this->request->getVar('pwd'),PASSWORD_DEFAULT);
                        
                            if($this->loginModel->updatePassword($token,$pwd))
                            {
                                session()->setTempdata('success','Password update succesfully',3);
                                return redirect()->to(base_url().'/login');
                            }
                            else
                            {
                                session()->setTempdata('error','sorry unable update password. please contact admin',3);
                                return redirect()->to(current_url());
                            }
                        }
                        else
                        {
                            $data['validation'] = $this->validator;
                        }
                    }
                }
                else
                {
                    $data ['error'] = 'Reset Password link was expired';
                }
            }
            else
            {
                $data['error'] = 'unable to find user account';
            }

        }
        else
        {
            $data['error'] = 'sorry! unhautorized access';
        }
       
        $data['title'] = 'Reset Password';

        return view('login/reset_password',$data);
    }

    public function checkExpiryDate($time)
    {
         $update_time = strtotime($time);
         $current_time = time();
         $timeDiff = ($current_time - $update_time)/60;
         if($timeDiff < 900)
         {
             return true;
         }
         else
         {
             return false;
         }
    }
}
