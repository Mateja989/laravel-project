<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $users = [
        [
            'role_id' => 2,
            'first_name' => 'Mateja',
            'last_name' => 'Mastelica',
            'avatar' => '/profile_picture/ja.jpg',
            'profile' => '/profile_picture/ja.jpg',
            'username' => 'matke12345',
            'email' => 'matkecar@gmail.com',
            'password'=>'matke12345'
        ],
    ];

    public function run()
    {
        foreach ($this->users as $u){
            User::create($u);
        }
    }
}
