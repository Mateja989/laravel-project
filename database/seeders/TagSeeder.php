<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $tags = [
        [
            "name" => "Disscusion",
            "description" => 'the action or process of talking about something in order to reach a decision or to exchange ideas. the committee acts as a forum for discussion'
        ],
        [
            "name" => "News",
            "description" => 'News is information about current events. This may be provided through many different media: word of mouth, printing, postal systems, broadcasting, electronic communication, or through the testimony of observers and witnesses to events. News is sometimes called "hard news" to differentiate it from soft media.'
        ],
        [
            "name" => "Humor",
            'description' => 'to do what someone wants so that they do not become annoyed or upset: I applied for the job just to humour my parents. Calming and relaxing. assuage.'
        ],
        [
            "name" => "Question",
            'description' => "Q & A is a situation in which a person or group of people asks questions and another person or group of people answers them. Q & A is short for 'question and answer'."

        ],
        [
            "name" => "Article",
            "description" => "a written composition in prose, usually nonfiction, on a specific topic, forming an independent part of a book or other publication, as a newspaper or magazine."
        ],
        [
            "name" => "Show off",
            "description" => 'a written composition in prose, usually nonfiction, on a specific topic, forming an independent part of a book or other publication, as a newspaper or magazine.'
        ],
        [
            "name" => "Resource",
            "description" => 'to do what someone wants so that they do not become annoyed or upset: I applied for the job just to humour my parents. Calming and relaxing. assuage.'
        ],

    ];

    public function run()
    {
        foreach ($this->tags as $t){
            Tag::create($t);
        }
    }
}
