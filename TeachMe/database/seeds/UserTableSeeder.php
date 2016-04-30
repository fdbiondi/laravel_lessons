<?php

use Illuminate\Database\Seeder;
use TeachMe\Entities\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        $this->createAdmin();
    }

    private function createAdmin()
    {
        User::create([
            'name'=>'Federico Biondi',
            'email'=>'fdbion@gmail.com',
            'password'=>bcrypt('1454710050'),
        ]);
    }

}