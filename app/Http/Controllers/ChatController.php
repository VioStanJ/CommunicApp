<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll(Request $request,$id)
    {
        $user = $request->user();

        // $chats = Chat::where('from','')
    }

    public function send(Request $request)
    {
        $request->validate([
            'to'=>'required',
            'message'=>'required',
            'is_media'=>'',
        ]);

        $user = $request->user();

        $chat = Chat::create([
            'user_from'=>$user->id,
            'user_to'=>$request->to,
            'message'=>$request->message,
            'is_media'=>$request->is_media??0
        ]);

        return response()->json(['success'=>true,'chat'=>$chat], 200);
    }
}
