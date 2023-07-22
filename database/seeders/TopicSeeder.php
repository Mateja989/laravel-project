<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $topics = [
        [
            'name' => 'Programming',
            'slug' => 'programming',
        ],
        [
            'name' => 'Web Design',
            'slug' => 'web-design'
        ],
        [
            'name' => 'Marketing',
            'slug' => 'marketing'
        ]
    ];

    public function run()
    {
        foreach ($this->topics as $t){
            Topic::create($t);
        }

    }
}
