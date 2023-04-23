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
            base_url('./assets/admin/js/event.js'), 
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

    public function edit ($id) {
        $user = $this->services->getUserById($id);

        if(!$user){
            return redirect('error/404');
        }


            $dataLayout['user'] = $user;
            $jsFile = [
                base_url('./assets/admin/js/event.js'), 
            ];
            $data = [];
            $data = $this->loadMasterLayout($data, 'Sửa tài khoản', 'admin/pages/user/edit', $dataLayout, [],$jsFile );

            return view('admin/main', $data);
        
    }

    public function update() {
        $result = $this->services->updateUserInfo($this->request);

        return redirect()->back()->withInput()->with($result['messageCode'],$result['message'] );
    }

    public function delete ($id) {
        $user = $this->services->getUserById($id);

        if(!$user){
            return redirect('error/404');
        }

        $result = $this->services->deleteUser($id);

        return redirect('admin/user/list')->with($result['messageCode'],$result['message']);
    }
}

