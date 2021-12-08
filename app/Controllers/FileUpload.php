<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class FileUpload extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $data = [];
        IF($this->request->getMethod()=='post')
        {
            
            $rules = [
                'avatar' => 'uploaded[avatar]|max_size[avatar,1024]|ext_in[avatar,jpg,png,gif,jpeg]',
            ];
            if($this->validate($rules))
            {
                
                    $file = $this->request->getFile('avatar');
                    if($file->isValid() && !$file->hasMoved())
                    $newName = $file->getRandomName();
                        {
                            if($file->move(WRITEPATH.'uploads/',$newName))
                            {
                                echo '<P>sukses upload</p>';
                            }
                            else
                            {
                                echo $file->getErrorString() ." ".$file->getError();
                            }
                        }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
            

        }
        return view('uploadfile',$data);
    }
}
