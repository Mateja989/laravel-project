<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){



        return view('pages.client.user.index',[
            'users' => User::all()->load('questions','role')->where('role_id','=','1')
        ]);
    }

    public function show(User $user){
        return view('pages.client.user.show',[
                'user' => $user->load(['questions' => function($query){
                $query->orderBy('created_at','desc');
            }])
        ]);
    }

}
