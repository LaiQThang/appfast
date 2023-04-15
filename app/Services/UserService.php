<?php

namespace App\Services;

use App\Models\UserModels;
use App\Common\ResultUtils;
use Exception;

class UserService extends BaseService {

    private $users; 
    // Contructer
    function __construct()
    {
        parent::__construct();
        $this->users = new UserModels();
        $this->users->protect(false);
    }

    // Get all data users
     public function getAllUsers()
    {
        return $this->users->findAll();
    }
    
    // Add new user
    public function addUser($requestData)
    {
        $validate = $this->validateAddUser($requestData);

        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors()
            ];
        }
        
            $dataSave = $requestData->getPost();
            unset($dataSave['password_confirm']);
            $dataSave['password'] = password_hash($dataSave['password'], PASSWORD_BCRYPT);

            try {
                $this->users->save($dataSave);
                return [
                    'status' => ResultUtils::STATUS_CODE_OK,
                    'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                    'message' => ['succes' => "Đăng ký thành công"]
                ];
            } catch (Exception $e) {
                return [
                    'status' => ResultUtils::STATUS_CODE_ERR,
                    'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                    'message' => ['error' => $e->getMessage()]
                ];
            }
        
    }

    private function validateAddUser($requestData){
        $rule = [
            'email' => 'valid_email|is_unique[users.email]',
            'name' => 'max_length[100]',
            'password' => 'max_length[30]|min_length[6]',
            'password_confirm' => 'matches[password]',

        ];

        $messages = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} không đúng định dạng!',
                'is_unique' => 'Email đã được đăng ký!',

            ],
            'name' => [
                'max_length' => 'Tên quá dài!',
            ],
            'password' => [
                'max_length' => 'Mật khẩu quá dài!',
                'min_length' => 'Mật khẩu quá ngắn, ít nhất {param} kí tự!',
            ],
            'password_confirm' => [
                'matches' => 'Mật khẩu không khớp!',
            ],
        ];

        $this->validation->setRules($rule, $messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}

