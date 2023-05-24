<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends ActionController
{
    public function index(){
        return view("pages.client.profile.index");
    }

    public function edit(User $user){
        if($user->id != auth()->id())
            return back();


        return view('pages.client.profile.edit', [
                'user' => $user
        ]);
    }

    public function update(UpdateProfileRequest $request,User $user){
        try{

            if(!$request->file('profile_picture')){
                $attributes = [
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                ];
            }
            else{
                $attributes=[
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'email' => $request->get('email'),
                    'password' => $request->get('password'),
                    'avatar' => $request->file('profile_picture'),
                    'profile' => $request->file('profile_picture')
                ];
            }



            $user->update($attributes);
            $this->logAction(auth()->user()->username." edited his profile.",request());

            return redirect('/profile')->with('updated','Successfully updated your profile');
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }
    }

    public function destroy(User $user){

        $this->logAction(auth()->user()->username." deleted account.",request());
        $user->delete();
        return redirect('/');
    }



}
