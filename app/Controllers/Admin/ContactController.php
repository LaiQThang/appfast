<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ContactService;

class ContactController extends BaseController
{
    /**
     * @var Service
     */
    private $services;

    public function __construct()
    {
        $this->services = new ContactService();
    }

    public function list()
    {
        $data = [];
        $dataLayout['contact'] = $this->services->getDataPaginateContact();
        $dataLayout['pager'] = $this->services->getPagerContact();

        $cssFile = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url('./assets/admin/css/dataTable.css'),
        ];
        $jsFile = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url('./assets/admin/js/dataTable.js'), 
            base_url('./assets/admin/js/event.js'), 
        ];
        $data = $this->loadMasterLayout($data, 'Danh sách liên hệ', 'admin/pages/contact/list',$dataLayout, $cssFile, $jsFile);
       
        return view('admin/main', $data);
    }

}

