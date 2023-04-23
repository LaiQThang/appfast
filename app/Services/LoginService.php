<?php

namespace App\Services;

// use App\Models\UserModels;
use App\Common\ResultUtils;
use App\Models\UserModels;
use Exception;

class LoginService extends BaseService {

    private $users; 
    // Contructer
    function __construct()
    {
        parent::__construct();
        $this->users = new UserModels();
    }

    public function handleLogin($requestData){
        $validate = $this->validateLogin($requestData);

        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors()
            ];
        }

        $param = $requestData->getPost();

        $user = $this->users->where('email', $param['email'])->first();
        if(!$user){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['err' => "Tài khoản không tồn tại"]
            ];
        }

        if(!password_verify($param['password'], $user['password'])){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['err' => "Sai mật khẩu"]
            ];
        }

        $session = session();
        unset($user['password']);

        $session->set('user_login', $user);

        return [
            'status' => ResultUtils::STATUS_CODE_OK,
            'messageCode' => ResultUtils::MESSAGE_CODE_OK,
            'message' => ['succes' => "Đăng nhập thành công"]
        ];
    }

    private function validateLogin($requestData){
        $rule = [
            'email' => 'valid_email',
            'password' => 'max_length[30]|min_length[6]',

        ];

        $messages = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} không đúng định dạng!',
            ],
            'password' => [
                'max_length' => 'Mật khẩu quá dài!',
                'min_length' => 'Mật khẩu quá ngắn, ít nhất {param} kí tự!',
            ]
        ];

        $this->validation->setRules($rule, $messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function logoutUser(){
        $session = session();
        $session->destroy();
    }

}

