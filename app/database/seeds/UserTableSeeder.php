<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++)
        {
            \DB::table('users')->insertGetId(array(
                'name'          =>  $faker->firstName,
                'last_name'     =>  $faker->lastName,
                'email'         =>  $faker->unique()->email,
                'password'      =>  \Hash::make('123456'),
                'photo'         =>  'perfil.png',
                'user_name'     =>  $faker->userName,
                'manager'       =>  2,
                'role_id'       =>  3,
                'address'       =>  $faker->address,
                'phone'         =>  123456
            ));
        }

    }
}