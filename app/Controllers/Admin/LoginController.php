<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginService;
use LDAP\ResultEntry;

class LoginController extends BaseController
{
    /**
     * @var Service
     */
    private $services;

    public function __construct()
    {
        $this->services = new LoginService();
    }
    public function index()
    {

        $data['title'] = "Đăng nhập";
       
        return view('admin/pages/user/login', $data);
    }

    public function login(){
        $result = $this->services->handleLogin($this->request);

        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return redirect('admin/home');
        }
        elseif($result['status'] === ResultUtils::STATUS_CODE_ERR){
            return redirect('admin/login')->with($result['messageCode'],$result['message']);
        }
        return redirect('home');
    }

    public function logout(){

        $this->services->logoutUser();

        return redirect('admin/login');
    }
}

