<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use App\Models\User;

class InvitationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function send(Request $request)
    {
        $request->validate([
            'invite_emails'=>'required|email',
            'invite_topic'=>'required'
        ]);

        $user = $request->user();

        if($request->invite_emails == $user->email){
            return redirect()->back()->withErrors(["Meme email que le votre :/ !"]);
        }

        $user_invitation = User::where('email','=',$request->invite_emails)->get()->first();

        if(!isset($user_invitation)){
            return redirect()->back()->withErrors(['Aucun utilisateur trouvé :/ !']);
        }

        $friend = Friend::where('request_from','=',$user->id)->where('request_to','=',$user_invitation->id)->where('status','=',1)->get()->first();

        if(isset($friend)){
            return redirect()->back()->withErrors(['Vous etes deja ami :) !']);
        }

        Friend::create([
            'request_from'=>$user->id,
            'request_to'=>$user_invitation->id,
            'topic'=>$request->invite_topic
        ]);

        return redirect()->back();
    }

    public function repond(Request $request,$id,$status)
    {
        $user = $request->user();

        $friend = Friend::where('id','=',$id)->where('request_to','=',$user->id)->where('status','=',0)->get()->first();

        if(!isset($friend)){
            return redirect()->back()->withErrors(['Invitation Passée :/ !']);
        }

        $friend->status = $status;

        $friend->save();
        return redirect()->back();
    }
}
