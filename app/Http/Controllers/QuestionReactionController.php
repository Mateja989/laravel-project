<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReactionRequest;
use App\Models\Question;
use App\Models\Reaction;
use Illuminate\Http\Request;

class QuestionReactionController extends Controller
{
    public function like(StoreReactionRequest $request){

       Reaction::create([
           'question_id' => \request()->get('post'),
            'user_id' => auth()->user()->id,
            'reaction' => \request()->get('like'),
       ]);

       $likes = Question::find(\request()->get('post'))->reactions()->where('reaction',0)->count();
       $dislikes = Question::find(\request()->get('post'))->reactions()->where('reaction',1)->count();

       $response = [
           'likes' => $likes,
           'dislikes'=>$dislikes
       ];

       return response()->json($response);
    }

    public function dislike(StoreReactionRequest $request){
        Reaction::create([
            'question_id' => \request()->get('post'),
            'user_id' => auth()->user()->id,
            'reaction' => \request()->get('like'),
        ]);

        return back();
    }
}
