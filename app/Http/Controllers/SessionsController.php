<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionsController extends ActionController
{
    public function create(){
        return view('pages.login');
    }

    public function store(){
        $attrs = request()->validate([
            'username' => ['required','max:25','min:5'],
            'password' => ['required','max:50']
        ]);
        if(auth()->attempt($attrs)){
            $this->logAction(request()->get('username')." logged in.",request());
           // session()->put('user',auth()->user());
            if(auth()->user()->role->name == 'Admin'){
                return redirect('/admin/dashboard');
            }
            return redirect('/myfollowing');
        }

       throw ValidationException::withMessages([
           'failed' => 'Your provided credentials does not exist in database.'
       ]);
    }

    public function destroy(){
        $this->logAction(auth()->user()->username." logout just now.",request());
        auth()->logout();
        return redirect('/');
    }
}
