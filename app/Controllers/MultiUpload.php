<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MultiUpload extends BaseController
{
    public function __construct()
    {
        helper('form');
    }
    public function index()
    {
        $data = [];

        return view('multiupload.php',$data);
    }
}
