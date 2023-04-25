<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\PurchaseService;

class HomeController extends BaseController
{

    /**
     * @var Service
     */
    private $services;

    public function __construct()
    {
        $this->services = new PurchaseService();
    }
    public function index()
    {
        
        $data['puchases'] = $this->services->getAllPurchases();

        return view('index', $data);
    }

    
}
