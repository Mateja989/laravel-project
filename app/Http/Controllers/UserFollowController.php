<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class UserFollowController extends Controller
{

    public function index(){

        $my = User::find(auth()->user()->id)->myFollowing;
        $ids = [];
        foreach ($my as $x){
            $ids[] = $x->id;
        }

        return view('pages.client.follow_questions',[
           'questions' => Question::whereIn('user_id',$ids)->filter(\request(['keyword','topic']))->paginate(5)->withQueryString()
        ]);

    }

    public function storeAjax(){


        User::find(auth()->user()->id)->myFollowing()->attach(\request()->get('user'));

        $message = [
          'success' => 'Your are following new user now.',
          'users' => User::all(),
        ];

        return response()->json($message);
    }

    public function store(){
        User::find(auth()->user()->id)->myFollowing()->attach(\request()->get('user'));
        return back()->with('message','You have successfully followed this user');
    }

    public function destroy(){
        User::find(auth()->user()->id)->myFollowing()->detach(\request()->get('user'));
        return back()->with('message','You have successfully unfollowed this user');
    }

    public function destroyAjax(){
        User::find(auth()->user()->id)->myFollowing()->detach(\request()->get('user'));

        $message = [
            'success' => 'You have successfully unfollowed this user'
        ];

        return response()->json($message);
    }



}
