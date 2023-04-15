<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [];
        $data = $this->loadMasterLayout($data, 'Trang chủ', 'admin/pages/home');
       
        return view('admin/main', $data);
    }
}

