<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UpDbSeeder extends Seeder
{
    public function run()
    {
        $this->call('UserSeeder');
    }
}
