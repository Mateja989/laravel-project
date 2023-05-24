<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminTopicController extends Controller
{
    //slikaj network
    public function index(){
        return view('pages.admin.topic.index',[
           'topics' => Topic::all()
        ]);
    }

    public function create(){
        return view('pages.admin.topic.create');
    }
    public function store(StoreTopicRequest $request){

        try{
            Topic::create([
                'name' => $request->get('name'),
                'slug' => $request->get('slug'),
                'icon' => $request->file('image')->store('storage/topic')
            ]);
            return back()->with('success','Successfuly created new topic');
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }

        //debounce -> nije klasican keyup

    }
    public function edit(Topic $topic){
        return view('pages.admin.topic.edit',[
            'topic' => $topic
        ]);
    }
    public function update(Topic $topic){
        $attributes = \request()->validate([
            'name' => ['required','min:5','max:20'],
            'slug' => ['required','min:5','max:20']
        ]);

        $topic->update($attributes);
        return back()->with('success','Successfuly updated');
    }
    public function destroy(Topic $topic){
        $topic->delete();
        return back()->with('success','Successfully deleted');
    }

}
