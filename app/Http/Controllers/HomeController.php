<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use App\Models\User;
use DB;

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

        $friends = DB::select('select c.id,c.request_from,c.request_to from (select * from friends where status=1 and request_from= '.$user->id.' or request_to= '.$user->id.') as c where status=1');

        foreach ($friends as $key => $value) {
            if($value->request_from != $user->id){
                $value->user = User::find($value->request_from);
            }else{
                $value->user = User::find($value->request_to);
            }
        }

        return view('home',compact(['invitations','friends']));
    }
}
