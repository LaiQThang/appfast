<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Dùng thử',
                'price' => '$0/MONTH',
                'email_address' => '250',
                'storage' => '125GB',
                'databases' => '140',
                'domain' => '60',
                'support' => '24/7 trong ngày',
            ],
            [
                'name' => 'Gói thanh toán theo năm',
                'price' => '$400/YEAR',
                'email_address' => '150',
                'storage' => '65GB',
                'databases' => '60',
                'domain' => '30',
                'support' => '24/7 trong ngày',
            ],
            [
                'name' => 'Vĩnh viên',
                'price' => '$5000/1 LẦN DUY NHẤT',
                'email_address' => '250',
                'storage' => '125GB',
                'databases' => '140',
                'domain' => '60',
                'support' => '24/7 trong ngày',
            ],
            
        ];

        $this->db->table('purchases')->insertBatch($data);
    }
}
