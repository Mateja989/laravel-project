<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends ActionController
{
    public function store(Question $question,Request $request){

        $request->validate([
            'body' => ['required']
        ]);

        $question->answers()->create([
            'user_id' => $request->user()->id,
            'body' => $request->input('body')
        ]);

        $this->logAction(auth()->user()->username." answered on question.",request());

        return back();
    }

    public function storeAjax(){


        Question::find(\request()->get('question'))->answers()->create([
            'user_id' => auth()->user()->id,
            'body'=> \request()->get('answer')
        ]);


        $answers = Question::find(\request()->get('question'))->answers()->with('author')->get();




        return response()->json($answers);

    }

}
