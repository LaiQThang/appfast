<?php

namespace App\Services;

use App\Common\ResultUtils;
use App\Models\PurchasesModels;
use Exception;

class PurchaseService extends BaseService {

    private $purchases; 
    // Contructer
    function __construct()
    {
        parent::__construct();
        $this->purchases = new PurchasesModels();
        $this->purchases->protect(false);
    }

    public function getAllPurchases() {
        return $this->purchases->findAll();
    }

    public function getPurchaseById($id){
        return $this->purchases->where('id', $id)->first();
    }

    public function addPurchase($requestData)
    {
        $validate = $this->validatePurchase($requestData);

        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors()
            ];
        }
        
            $dataSave = $requestData->getPost();

            try {
                $this->purchases->save($dataSave);
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

    private function validatePurchase($requestData){
        $rule = [
            'name' => 'max_length[100]',
            'price' => 'max_length[100]',
            'email_address' => 'max_length[100]',
            'storage' => 'max_length[100]',
            'databases' => 'max_length[100]',
            'domain' => 'max_length[100]',
            'support' => 'max_length[100]',
        ];

        $messages = [
            'name' => [
                'max_length' => 'Tên người dùng quá dài, vui lòng nhập từ {param} ký tự.',
            ],
            'price' => [
                'max_length' => 'Giá bán quá dài, vui lòng nhập từ {param} ký tự.',
            ],
            'email_address' => [
                'max_length' => 'Email quá dài, vui lòng nhập từ {param} ký tự.',
            ],
            'storage' => [
                'max_length' => 'Số lượng quá dài, vui lòng nhập từ {param} ký tự.',
            ],
            'databases' => [
                'max_length' => 'Số lượng quá dài, vui lòng nhập từ {param} ký tự.',
            ],
            'doamin' => [
                'max_length' => 'Nội dung dùng quá dài, vui lòng nhập từ {param} ký tự.',
            ],
            'support' => [
                'max_length' => 'Nội dung quá dài, vui lòng nhập từ {param} ký tự.',
            ],
        ];

        $this->validation->setRules($rule, $messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function updatePurchase($requestData){
        $validate = $this->validatePurchase($requestData);

        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => $validate->getErrors()
            ];
        }
        
        $dataSave = $requestData->getPost();
        try {
            $this->purchases->save($dataSave);
                return [
                    'status' => ResultUtils::STATUS_CODE_OK,
                    'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                    'message' => ['succes' => "Cập nhật dữ liệu thành công"]
                ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['error' => $e->getMessage()]
            ];
        }
    }

    public function deletePurchase($id){
        try {
            $this->purchases->delete($id);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'message' => ['succes' => "Xóa dữ liệu thành công"]
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'message' => ['error' => $e->getMessage()]
            ];
        }
    }
}

