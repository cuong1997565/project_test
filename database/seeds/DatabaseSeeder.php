<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
    }
}

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           ['username'=>'teo','email'=>'teo@gmail.com','password'=>Hash::make(12345),'level'=>1],
           ['username'=>'tun','email'=>'tun@gmail.com','password'=>Hash::make(12345),'level'=>2],
           ['username'=>'tuan','email'=>'tuan@gmail.com','password'=>Hash::make(12345),'level'=>3]
        ]);
    }
}

