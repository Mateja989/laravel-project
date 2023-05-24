<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateContactForm;
use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('pages.contact');
    }

    public function send(ValidateContactForm $request){

        try{
            $data = [
                'subject' => $request->subject,
                'name' => $request->name,
                'email' => $request->email,
                'content' =>$request->body,
            ];
            Mail::to('programerweba@gmail.com')
                ->send(new ContactMe($data));

            return back()->with(['message'=>'Email successfully send']);
        }
        catch (\Exception $e){

        }
    }
}
