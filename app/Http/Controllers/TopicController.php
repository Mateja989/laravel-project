<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(){
        return view('pages.client.topic.index',[
           'topics' => Topic::all()
        ]);
    }

    public function show(Topic $topic){
        //ispis pitanja iz te kategorije
    }
}
