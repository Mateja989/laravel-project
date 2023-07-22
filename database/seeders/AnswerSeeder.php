<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $answers = [
        [
            'question_id' => 1,
            'user_id' => 1,
            'body' => 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standar'
        ],
        [
            'question_id' => 1,
            'user_id' => 1,
            'body' => 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standar'
        ],
        [
            'question_id' => 1,
            'user_id' => 1,
            'body' => 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standar'
        ],
        [
            'question_id' => 1,
            'user_id' => 1,
            'body' => 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standar'
        ],

    ];


    public function run()
    {
        foreach ($this->answers as $a){
            Answer::create($a);
        }

    }
}
