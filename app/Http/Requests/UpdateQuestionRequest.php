<?php

namespace App\Http\Requests;

use App\Rules\TagIdsExist;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateQuestionRequest extends FormRequest
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
    private $titlePattern = '/^[A-Za-z0-9\-\?\s\#]{3,50}$/';

    public function rules()
    {
        return [
            'title' => ['required'],
            'slug' => ['required'],
            'excerpt' => ['required'],
            'topic_id' => ['required', Rule::exists('topics', 'id')],
            'body' => ['required'],
            'user_id' => [Rule::exists('users', 'id')],
        ];
    }
}
