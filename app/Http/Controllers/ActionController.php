<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function logAction($action,Request $request,$user_id = null){
        $attr = [
            'ip' => $request->ip(),
            'path' => $request->path(),
            'action' => $action,
            'user_id' => auth()->check() ? auth()->user()->id : $user_id,
            'created_at' => now()
        ];

        try{
            Action::create($attr);
        }
        catch (\Exception $e){
            dd($e->getMessage());
        }
    }
}
