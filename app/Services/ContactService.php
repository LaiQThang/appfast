<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\ContactModels;
use Exception;

class ContactService extends BaseService {

    private $contact; 
    // Contructer
    function __construct()
    {
        parent::__construct();
        $this->contact = new ContactModels();
        $this->contact->protect(false); 
    }

    public function getDataPaginateContact() {
        return $this->contact->orderBy('id', 'DESC')->paginate(4);
    }
    
    public function getPagerContact(){
        return $this->contact->pager;
    }

    public function addContact($requestData){
        // dd( $requestData->getPost());
        // $result = $this->validateContact($requestData);

        // if($result->getErrors()){
        //     return;
        //     // return [
        //     //     'status' => ResultUtils::STATUS_CODE_ERR,
        //     //     'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
        //     //     'message' => $result->getErrors()
        //     // ];
        // }
        
            $dataSave = $requestData->getPost();
            if($dataSave['last_name']){
                $dataSave['name'] = $dataSave['last_name'];
            }
            else{
                $dataSave['name'] = $dataSave['first_name'];

            }
            if($dataSave['comments']){
                $dataSave['content'] = $dataSave['comments'];
            }
            else{
                $dataSave['content'] = '';
            }
            $dataSave['mail'] = $dataSave['email'];
            unset($dataSave['first_name']);
            unset($dataSave['last_name']);
            unset($dataSave['comments']);
            unset($dataSave['email']);
            $dataSave['seen'] = 0;
            $dataSave['readed'] = 0;
            try {
                $this->contact->save($dataSave);
                return [
                    'status' => ResultUtils::STATUS_CODE_OK,
                    'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                    'message' => ['succes' => "Liên hệ thành công"]
                ];
            } catch (Exception $e) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['error' => $e->getMessage()]
                ];
            }
    }

    private function validateContact($requestData){
        $rule = [
            'name' => 'min_length[1]',
            'mail' => 'min_length[1]',
            'phone' => 'min_length[1]',
            'content' => 'min_length[1]',
        ];

        $messages = [
            'name' => [
                'min_length' => 'Tối thiểu 1 ký tự',
            ],
            'mail' => [
                'min_length' => 'Tối thiểu 1 ký tự',
            ],
            'phone' => [
                'min_length' => 'Tối thiểu 1 ký tự',
            ],
            'content' => [
                'min_length' => 'Tối thiểu 1 ký tự',
            ]
        ];

        $this->validation->setRules($rule, $messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}

