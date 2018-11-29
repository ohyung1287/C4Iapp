<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        User::truncate();
        $user  = User::create(array('account'=>'admin','password'=>Hash::make('admin'),'resident_id'=>-1));
    }
}
