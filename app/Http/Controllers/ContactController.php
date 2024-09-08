<?php

namespace App\Http\Controllers;

use App\Http\Requests\messageRequest;
use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Save Message Controller
    public function saveMessage(messageRequest $request) {
        $message = new contact();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->number = $request->number;
        $message->message = $request->message;
        if($message->save()){
            return redirect()->back();
        }
    }

    // Show Messages
    public function messages() {
        $messages = contact::all();
        return view('admin.messages', compact('messages'));
    }

    // Delete Message
    public function deleteMessage($id) {
        $message = contact::find($id)->delete();
        if($message){
            return redirect()->back();
        }
    }
}
