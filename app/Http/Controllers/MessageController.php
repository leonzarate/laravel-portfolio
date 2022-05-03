<?php

namespace App\Http\Controllers;

use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(){
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'content' => 'required|min:3',
        ], [
            'name.required' => __('I need your name'),
        ]);


        Mail::to(request('email'))->cc('leonzarate@gmail.com')->send(new MessageReceived);

        return back()
            ->with('status','Recibimos tu mensaje, te responderemos en menos de 24 horas!!.');
    }
}
