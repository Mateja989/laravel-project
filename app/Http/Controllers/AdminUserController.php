<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(){
        return view('pages.admin.user.index',[
           'users' => User::all()->where('role_id',1)
        ]);
    }

    public function destroy(User $user){


    }
}
