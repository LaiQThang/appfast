<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        $data = [];

        for($i =  0 ; $i < 50 ; $i ++){
            array_push($data, [
                'name' => "Jerry",
                'mail' => 'Jerry.dev'.$i.'@gmail.com',
                'phone' => '0328394132',
                'content' => 'Nội dung '.$i,
            ]);
        }

        $this->db->table('contact')->insertBatch($data);
    }
}
