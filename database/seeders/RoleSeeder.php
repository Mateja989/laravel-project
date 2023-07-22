<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $roles = [
        [
            "name" => "User"
        ],
        [
            "name" => "Admin"
        ]
    ];

    public function run()
    {
      foreach ($this->roles as $r){
          Role::create($r);
      }
    }
}
