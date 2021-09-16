<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupUser;

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
}
