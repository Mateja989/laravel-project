<?php

namespace App\Http\Requests;

use App\Rules\UniqueReactionPerPost;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //array keys niz kljuceba
        return [
            'post' => ['required',Rule::exists('questions','id'),new UniqueReactionPerPost($this->request->get('post'))],
            'like' => ['required',Rule::in([0,1])],
        ];


    }
}
