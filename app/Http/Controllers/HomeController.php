<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $invitations = Friend::where('request_to','=',$user->id)->where('status','=',0)->get();

        foreach ($invitations as $key => $value) {
            $value->friend = User::find($value->request_from);
        }

        return view('home',compact(['invitations']));
    }
}
