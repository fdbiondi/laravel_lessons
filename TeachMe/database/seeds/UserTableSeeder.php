<?php

use Faker\Generator;
use TeachMe\Entities\User;
use Styde\Seeder\Seeder;

class UserTableSeeder extends Seeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt('secret'),
        ];
    }

    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(50);
    }

    private function createAdmin()
    {
        $this->create([
            'name' => 'Federico Biondi',
            'email' => 'fdbion@gmail.com',
            'password' => bcrypt('1454710050'),
        ]);
    }
}
