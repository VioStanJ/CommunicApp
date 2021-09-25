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

        $chats = DB::select("SELECT tmp.* from (SELECT * from chats where user_from=".$user->id." and user_to=".$id." or user_from=".$id." or user_to=".$user->id." ) as tmp where status in (1,5) order by created_at asc");

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
            $img_name = time().$image->getClientOriginalExtension();
            $desti = public_path($store);

            $chat->is_media = 1;
            $chat->link = '/storage/images/'.$img_name;

            $image->move($desti,$img_name);

            if(empty($request->message)){
                $chat->message = $img_name;
            }
        }

        $chat->save();
        
        self::check($chat);

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
            'message'=>'',
            'is_media'=>'',
        ]);

        $user = $request->user();

        $chat = new GroupChat();
        $chat->from = $request->user_id;
        $chat->group_id = $request->group_id;
        $chat->message = $request->message;

        if($request->hasFile('image')){

            $store = '/storage/groups/images';
            self::mkdir($store);
            $image = $request->file('image');
            $img_name = time().$image->getClientOriginalExtension();
            $desti = public_path($store);

            $chat->is_media = 1;
            $chat->link = '/storage/groups/images/'.$img_name;

            $image->move($desti,$img_name);

            if(empty($request->message)){
                $chat->message = $img_name;
            }
        }

        $chat->save();
        
        self::check($chat);

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

    public function check($chat){

        if(!$chat->is_media){
            return;
        }

        $url = "https://sightengine.com/assets/img/examples/example7.jpg";
        // $url = "http://app.cdevlop.com".$chat->link;

        //'https://sightengine.com/assets/img/examples/example7.jpg'

        $params = array(
            'url' =>  $url,
            'models' => 'nudity,wad,text-content,gore',
            'api_user' => '1994892077',
            'api_secret' => 'geW8wGH6Hy2xy6qYm5tw',
        );

        // this example uses cURL
        $ch = curl_init('https://api.sightengine.com/1.0/check.json?'.http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($response, true);
        $msj = 'CONTIENT : ';

        
        if(($output['nudity']['partial']) > 50 || ($output['nudity']['raw']) > 50 || ($output['nudity']['safe']) > 50){
            $msj .= "NUDITE  ;";
            $chat->status = 5;
        }


        if($output['drugs']*100 > 50){
            $msj .= "DROGUE ; ";
            $chat->status = 5;
        }

        if($output['alcohol']*100 > 50){
            $msj .= "ALCOOL ; ";
            $chat->status = 5;
        }

        if($output['weapon']*100 > 50){
            $msj .= "ARME ; ";
            $chat->status = 5;
        }

        $chat->message = $msj;
        
        $chat->save();
    }
}
