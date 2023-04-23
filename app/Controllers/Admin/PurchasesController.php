<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\PurchaseService;

class PurchasesController extends BaseController
{
    /**
     * @var Service
     */
    private $services;

    public function __construct()
    {
        $this->services = new PurchaseService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['purchases'] = $this->services->getAllPurchases();
        $cssFile = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url('./assets/admin/css/dataTable.css'),
        ];
        $jsFile = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url('./assets/admin/js/dataTable.js'), 
            base_url('./assets/admin/js/event.js'), 
        ];
        $data = $this->loadMasterLayout($data, 'Danh sách gói dịch vụ', 'admin/pages/purchases/list',$dataLayout, $cssFile, $jsFile);
       
        return view('admin/main', $data);
    }



    public function add()
    {
        $data = [];
        $dataLayout['purchases'] = [];
        $cssFile = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url('./assets/admin/css/dataTable.css'),
        ];
        $jsFile = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url('./assets/admin/js/dataTable.js'), 
            base_url('./assets/admin/js/event.js'), 
        ];
        $data = $this->loadMasterLayout($data, 'Thêm mới gói dịch vụ', 'admin/pages/purchases/add',$dataLayout, $cssFile, $jsFile);
       
        return view('admin/main', $data);
    }

    public function create()
    {
        $result = $this->services->addPurchase($this->request);

        return redirect('admin/purchases/add')->withInput()->with($result['messageCode'],$result['message'] );
    }

    public function edit($id){
        $purchase = $this->services->getPurchaseByID($id);
        $data = [];
        $dataLayout['purchases'] = $purchase;
        $cssFile = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url('./assets/admin/css/dataTable.css'),
        ];
        $jsFile = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url('./assets/admin/js/dataTable.js'), 
            base_url('./assets/admin/js/event.js'), 
        ];
        $data = $this->loadMasterLayout($data, 'Thêm mới gói dịch vụ', 'admin/pages/purchases/edit',$dataLayout, $cssFile, $jsFile);
       
        return view('admin/main', $data);
        
    }

    public function update() {
        $result = $this->services->updatePurchase($this->request);

        return redirect()->back()->withInput()->with($result['messageCode'],$result['message']);
    }


    public function delete($id){
        $result = $this->services->deletePurchase($id);

        return redirect('admin/purchases/list')->with($result['messageCode'],$result['message']);
    }
}

