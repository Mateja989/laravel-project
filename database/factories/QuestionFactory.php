<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Question::class;

    public function definition()
    {
        return [
            'topic_id'=>Topic::factory(),
            'user_id'=>User::factory(),
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'body'=> $this->faker->text,
        ];
    }


}
