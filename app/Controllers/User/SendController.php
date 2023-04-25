<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;
use App\Services\ContactService;

class SendController extends BaseController
{

    /**
     * @var Service
     */
    private $services;

    public function __construct()
    {
        $this->services = new ContactService();
    }
    public function send()
    {
        $result = $this->services->addContact($this->request);
        
        return redirect('')->with($result['messageCode'],$result['message']);
    }

}
