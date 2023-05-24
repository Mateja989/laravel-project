<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class RegisterController extends ActionController
{
    public function create(){
        return view('pages.register');
    }

    public function store(RegistrationRequest $request){
        try{
            User::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'avatar' => $request->file('profile_picture'),
                'profile' => $request->file('profile_picture'),
                'username' => $request->get('username'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
            ]);

            $this->logAction("New register ". $request->get('username'),$request);
            return redirect('/login')->with('success','Your account has been created,please login now.');
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }
    }

}
