<?php

namespace App\Rules;

use App\Models\Reaction;
use Illuminate\Contracts\Validation\InvokableRule;

class UniqueReactionPerPost implements InvokableRule
{

    public $question_id;

    function __construct($question_id){
        $this->question_id = $question_id;
    }
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        $count = Reaction::all()
            ->where('question_id',$this->question_id)
            ->where('user_id',auth()->user()->id)
            ->count();

        if($count){
            $fail("You have already reactioned to this question.");
        }
    }
}
