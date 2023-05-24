<?php

namespace App\Rules;

use App\Models\Tag;
use Illuminate\Contracts\Validation\InvokableRule;

class TagIdsExist implements InvokableRule
{
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
        $count =Tag::all()->whereIn('id',$value)->count();

        if(count($value) != $count){
            $fail("The database does not support all passed parameters.");
        }

    }
}
