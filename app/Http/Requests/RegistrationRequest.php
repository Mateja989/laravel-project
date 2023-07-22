<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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

    private $usernamePattern = '/^([a-z]{1})[a-z0-9]{4,29}$/';
    private $firstNamePattern = '/^[A-Z]{1}[a-z]{2,14}$/';
    private $lastNamePattern = '/^[A-Z]{1}[a-z]{4,29}$/';
    private $passwordPattern = '/^(?=.*\d)(?=.*[a-z]).{8,}$/';


    public function rules()
    {
        return [
            'first_name' => ['required','regex: '.$this->firstNamePattern],
            'last_name' => ['required','regex: '.$this->lastNamePattern],
            'profile_picture' => ['required','file','image'],
            'username' => ['required','regex: '.$this->usernamePattern,Rule::unique('users','username')],
            'email' => ['required','email','max:50',Rule::unique('users','email')],
            'password' => ['required','regex: '.$this->passwordPattern]
        ];
    }
}
