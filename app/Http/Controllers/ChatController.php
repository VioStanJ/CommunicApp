<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use DB;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all(Request $request,$id)
    {
        $user = $request->user();

        $chats = DB::select("SELECT tmp.* from (SELECT * from chats where user_from=".$user->id." and user_to=".$id." or user_from=".$id." or user_to=".$user->id." ) as tmp where status=1 order by created_at asc");

        return response()->json(['success'=>true,'chats'=>$chats], 200);
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

        $chat->avatar = $user->avatar;

        return response()->json(['success'=>true,'chat'=>$chat], 200);
    }

    public function last(Request $request,$id,$last)
    {
        $user = $request->user();

        $chats = DB::select('SELECT tmp.* from (SELECT * from chats where user_from='.$user->id.' and user_to='.$id.' or user_from='.$id.' or user_to='.$user->id.' ) as tmp where status=1 and id>'.$last.'');
        return response()->json(['success'=>true,'chats'=>$chats], 200);
    }
}
