<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $query = Action::latest();

        if(\request()->has('date') && \request()->get('date')){
            $query = $query->where('created_at','like',"%".\request()->get('date')."%");
        }

        return view('pages.admin.statistics',[
            'actions' => $query->paginate(10)->withQueryString()
        ]);
    }

}
