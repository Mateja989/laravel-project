<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class AdminQuestionController extends Controller
{
    public function index(){
        return view('pages.admin.guestion.index',[
            'questions' => Question::all()
        ]);
    }


}
