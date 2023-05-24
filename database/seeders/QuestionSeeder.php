<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $questions = [
        [
            'topic_id' => 1,
            'user_id' => 1,
            'title' => 'How can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy?',
            'excerpt' => 'How can I repHow can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy?How can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy??',
            'slug' => 'first-post',
            'body' => ' effect of the this background with either of HTML, CSS or JavaScript relatively easy?How can I re'
        ],
        [
            'topic_id' => 1,
            'user_id' => 1,
            'title' => 'How can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy?',
            'excerpt' => 'How can I repHow can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy?How can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy??',
            'slug' => 'second-post',
            'body' => 'How can ively easy?How can I replicate the pasty'
        ],
        [
            'topic_id' => 2,
            'user_id' => 1,
            'title' => 'How can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy?',
            'excerpt' => 'How can I repHow can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy?How can I replicate the pasty effect of the this background with either of HTML, CSS or JavaScript relatively easy??',
            'slug' => 'third-post',
            'body' => 'How can I replicate they'
        ],

    ];

    public function run()
    {
        foreach ($this->questions as $q){
            Question::create($q);
        }
    }
}
