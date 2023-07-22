<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Action;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UserQuestionController extends ActionController
{

    public function create(){

        return view('pages.questions.create',[
            'topics' => Topic::all(),
            'tags' => Tag::all()
        ]);

    }

    public function store(StoreQuestionRequest $request)
    {
        try{

            DB::beginTransaction();

            $lastInsert = Question::create([
                'title' => $request->get('title'),
                'excerpt' => $request->get('excerpt'),
                'slug' => $request->get('slug'),
                'topic_id' => $request->get('topic_id'),
                'body' => $request->get('body'),
                'user_id' => auth()->id()

            ]);

            $tags = $request->get('tags');

            Question::find($lastInsert->id)->tags()->attach($tags);

            $this->logAction(auth()->user()->username." asked a question.",request());

            DB::commit();

            return redirect('/')->with('posted', 'You successfully posted your question');
        }
        catch (\Exception $e){
            Log::error($e->getMessage() . "\n" . $e->getTraceAsString());
            DB::rollBack();
        }
    }

    public function edit(Question $question){

        if($question->user_id != auth()->id()) //mogu da prosledim parametar u midleware,polisi slicni ovome sto je napisano ovde
            return back();


        return view('pages.questions.edit',[
            'topics' => Topic::all(),
            'question' => $question
        ]);

    }

    public function update(Question $question,UpdateQuestionRequest $request){

        try{
            $attributes = [
                'title' => $request->get('title'),
                'excerpt' => $request->get('excerpt'),
                'slug' => $request->get('slug'),
                'topic_id' => $request->get('topic_id'),
                'body' => $request->get('body'),
                'user_id' => auth()->id()
            ];

            $question->update($attributes);

            $this->logAction(auth()->user()->username." edited his question.",request());
            return redirect('/profile')->with('status','Question updated');
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }

    }

    public function destroy(Question $question){
        $question->delete();
        $this->logAction(auth()->user()->username." deleted his question.",request());
        return back()->with('status','Deleted');
    }
}
