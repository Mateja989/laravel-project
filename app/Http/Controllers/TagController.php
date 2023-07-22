<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Topic;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        return view('pages.tags.index');
    }

    public function show(Tag $tag){
        return view('pages.questions.index',[
            'questions' => $tag->questions()->paginate(5)->withQueryString(),
        ]);
    }

}
