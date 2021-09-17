<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use Illuminate\Support\Facades\File;

class CheckController extends Controller
{
    public function get()
    {
        return view('content.index');
    }

    public function check(Request $request)
    {

        if($request->hasFile('image')){

            $store = '/storage/images';
            self::mkdir($store);
            $image = $request->file('image');
            $img_name = time().'.'.$image->getClientOriginalExtension();
            $desti = public_path($store);

            $chat = new Chat();
            $chat->user_from = 0;
            $chat->user_to = 0;
            $chat->message = 'Image Check ';
            $chat->is_media = 1;
            $chat->status = 1;
            $chat->link = '/storage/images/'.$img_name;

            $chat->save();


            $image->move($desti,$img_name);

        }

        return redirect()->to('/check/image/'.$chat->id);
    }

    public function getImage(Request $request,$id)
    {
        $chat = Chat::find($id);

        $url = "http://app.cdevlop.com".$chat->link;

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

        return view('content.result',compact('output','chat'));
    }

    public function mkdir($name)
    {
        // '/channels/cover'
        if(!File::isDirectory($name)){
            File::makeDirectory($name, 0777, true, true);
        }
    }
}
