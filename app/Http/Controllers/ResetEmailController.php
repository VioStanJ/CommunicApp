<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerifyCode;
use App\Mail\ResetAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ResetEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $user = User::where('email','=',$request->email)->get()->first();

        if(!isset($user)){
            return redirect()->back()->withErrors(['User not found :/ !!']);
        }

        $change = new VerifyCode();
        $change->user_id = $user->id;
        $change->code = 'VPASS-'.time();
        $change->expired_at = Carbon::tomorrow();

        $change->save();
        // dd($change);

        try {
            Mail::to($request->email)->send(new ResetAccount($user,$change));
        } catch (\Throwable $th) {
            dd($th);
        }

        $request->session()->put('resent', true);

        return redirect('/');
    }

    public function showResetForm(Request $request, $token){
        $change = VerifyCode::where('code','=',$token)->first();
        // dd($change);
        $user_id = $change->user_id;

        return \view('auth.passwords.resetform',\compact(['user_id']));
    }
    public function updatePassword(Request $request){
        $request->validate([
            'user_id'=>'required|numeric',
            'password'=>'required|confirmed|min:8',
        ]);
        $user = User::where('id','=',$request->user_id)->first();
        $user->password = \bcrypt($request->password);
        $user->save();
        return \redirect('login');
    }
}
