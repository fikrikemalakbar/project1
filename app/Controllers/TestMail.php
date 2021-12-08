<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestMail extends BaseController
{
    public function index()
    {
        $to = 'fikri.kemal.akbar@gmail.com';
        $subject = 'Account activate';
        $message = 'Hi fik,<br><br> Thanks your account created succesfully,please click the below link to activate your account<br><br>'. '<a href="'.base_url().'/testmail/verify" target="_blank">Activate Now</a><br><br>thanks';

        $email = \Config\Services::email();
        // $email->setBCC('exampbcc@mail.com');
        // $email->setCC('exampcc@gmail.com');
        $email->setFrom('info@mail.com','info');
        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);
        $filepath ='public/assets/img/newsapi.png';
        $email->attach($filepath);
        if($email->send())
        {
            echo "Account creaet";
        }
        else
        {
            $data = $email->printDebugger(['headers']);
            print_r($data);
        }
    }

    public function verfiy ()
    {
        echo 'account verfied';
    }
}
