<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\user;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $request->validate([
            'group_name'=>'required',
            'description'=>'required',
        ]);

        $user = $request->user();

        $group = Group::create([
            'name'=>$request->group_name,
            'topic'=>$request->description,
            'created_by'=>$user->id
        ]);

        GroupUser::create([
            'group_id'=>$group->id,
            'user_id'=>$user->id,
            'type'=>1,
            'status'=>1
        ]);

        return redirect()->back();
    }

    public function add(Request $request)
    {
        $request->validate([
            'group_id'=>'required',
            'topic'=>'required',
            'email'=>'required|email'
        ]);

        $user = User::where('email','=',$request->email)->get()->first();

        if(!isset($user)){
            return redirect()->back()->withErrors(['Utilisateur non trouve !']);
        }

        GroupUser::create([
            'group_id'=>$request->group_id,
            'user_id'=>$user->id,
            'type'=>2,
            'topic'=>$request->topic
        ]);

        return redirect()->back();
    }

    public function delete(Request $request,$id,$status)
    {
        $user = $request->user();

        $group = Group::where('id','=',$id)->get()->first();
        $group_users = GroupUser::where('group_id','=',$id)->get()->first();

        if($user->id == $group->created_by){
            $group->status = $status;
            $group->save();
            $group_users->status = $status;
            $group_users->save();
        }else{
            return redirect()->back()->withErrors(['You are not admin of this group :/ !']);
        }

        return redirect()->back();
    }

    public function repond(Request $request,$id,$status)
    {
        $user = $request->user();

        $friend = GroupUser::where('id','=',$id)->get()->first();

        if(!isset($friend)){
            return redirect()->back()->withErrors(['Invitation Passée :/ !']);
        }

        $friend->status = $status;

        $friend->save();
        return redirect()->back();
    }
}
