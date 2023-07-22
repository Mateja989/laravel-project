<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Topic;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades;


class QuestionController extends Controller
{

    public function index(){

        return view('pages.questions.index',[
            'questions' => Question::latest()->paginate(5)->withQueryString(),
        ]);

    }

    public function filter(){

       // $niz['keyword'][] = \request()->get('keyword') == null ? "" : \request()->get('keyword');
       // $niz['topic'][] = null;



        $questions = Question::latest()->filter(\request(['keyword','topic']))->get();


        $response = [
            'questions' => $questions,
            'views' => []
        ];

        /*foreach($questions->items() as $q) {
            $response['views'][] = Facades\View::make('componets.question_card',[
                'id' => $q->id,
                'title' => $q->title,
                'slug' => $q->slug,
                'topic' => $q->topic->name,
                'user' => $q->user->first_name. ' ' .$q->user->last_name,
                'username' => $q->user->username,
                'excerpt' => $q->excerpt,
                'tags' => $q->tags->pluck('name'),
                'avatar' => $q->user->avatar,
                'like' => $q->reactions->where('reaction',0)->count(),
                'dislike' => $q->reactions->where('reaction',1)->count(),
            ])->render();
        }*/

        return response()->json($questions);
    }

    public function show(Question $question){

        return view('pages.questions.show',[
            'question' => $question
        ]);
    }

    public function unanswered(){

        return view('pages.unanswered',[
            'questions' => Question::doesntHave('answers')->filter(\request(['keyword','topic']))->paginate(5)->withQueryString(),
        ]);
    }
}
