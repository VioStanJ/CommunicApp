<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use DB;
use App\Models\GroupChat;
use App\Models\user;
use Illuminate\Support\Facades\File;

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
            'message'=>'',
            'is_media'=>'',
            'image'=>'',
        ]);

        $user = $request->user();

        $chat = new Chat();

        $chat->user_from = $user->id;
        $chat->user_to = $request->to;
        $chat->message = $request->message;

        if($request->hasFile('image')){

            $store = '/storage/images';
            self::mkdir($store);
            $image = $request->file('image');
            $img_name = time().'test.'.$image->getClientOriginalExtension();
            $desti = public_path($store);

            $chat->is_media = 1;
            $chat->link = '/storage/images/'.$img_name;

            $image->move($desti,$img_name);

            if(strlen($request->message)<=0){
                $request->message = $img_name;
            }
        }

        $chat->save();
        
        $chat->avatar = $user->avatar;

        return response()->json(['success'=>true,'chat'=>$chat], 200);
    }

    public function last(Request $request,$id,$last)
    {
        $user = $request->user();

        $chats = DB::select('SELECT tmp.* from (SELECT * from chats where user_from='.$user->id.' and user_to='.$id.' or user_from='.$id.' or user_to='.$user->id.' ) as tmp where status=1 and id>'.$last.'');
        return response()->json(['success'=>true,'chats'=>$chats], 200);
    }

    public function sendGroup(Request $request)
    {
        $request->validate([
            'group_id'=>'required',
            'user_id'=>'required',
            'message'=>'required',
            'is_media'=>'',
        ]);

        $user = $request->user();

        $chat = GroupChat::create([
            'from'=>$request->user_id,
            'group_id'=>$request->group_id,
            'message'=>$request->message,
            'is_media'=>$request->is_media??0
        ]);

        return response()->json(['success'=>true,'chat'=>$chat], 200);
    }

    public function allGroup(Request $request,$group)
    {
        $chats = GroupChat::where('group_id','=',$group)->where('status','=',1)->get();

        foreach ($chats as $key => $value) {
            $value->user = User::find($value->from);
        }

        return response()->json(['success'=>true,'chats'=>$chats,'user'=>$request->user()], 200);
    }

    public function groupLast(Request $request,$id,$last)
    {
        $chats = GroupChat::where('group_id','=',$id)->where('id','>',$last)->where('status','=',1)->get();

        foreach ($chats as $key => $value) {
            $value->user = User::find($value->from);
        }

        return response()->json(['success'=>true,'chats'=>$chats,'user'=>$request->user()], 200);
    }

    public function sendFile(Request $request)
    {
        if($request->hasFile('image')){
            return response()->json(['FILE'=>$request->all()], 200);

        }

        return response()->json(['DATA'=>$request->all()], 200);
    }

    public function mkdir($name)
    {
        // '/channels/cover'
        if(!File::isDirectory($name)){
            File::makeDirectory($name, 0777, true, true);
        }
    }
}
