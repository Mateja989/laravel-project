<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Question;
use App\Models\Role;
use App\Models\User;
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
       $this->call([
          QuestionSeeder::class,
          RoleSeeder::class,
          UserSeeder::class,
          //TopicSeeder::class,
          AnswerSeeder::class,
          TagSeeder::class
       ]);
    }
}
