<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\UserService;

class UserController extends BaseController
{
    /**
     * @var Service
     */
    private $services;

    public function __construct()
    {
        $this->services = new UserService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['users'] = $this->services->getAllUsers();
        $cssFile = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url('./assets/admin/css/dataTable.css'),
        ];
        $jsFile = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url('./assets/admin/js/dataTable.js'), 
        ];
        $data = $this->loadMasterLayout($data, 'Danh sách tài khoản', 'admin/pages/user/list',$dataLayout, $cssFile, $jsFile);
       
        return view('admin/main', $data);
    }

    public function add()
    {
        $data = [];
       
        $data = $this->loadMasterLayout($data, 'Thêm tài khoản', 'admin/pages/user/add');

        return view('admin/main', $data);
    }

    public function create()
    {
        $result = $this->services->addUser($this->request);

        return redirect()->back()->withInput()->with($result['messageCode'],$result['message'] );
    }
}

