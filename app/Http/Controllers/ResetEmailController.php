<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerifyCode;
use App\Mail\ResetAccount;
use Carbon\Carbon;

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

        try {
            Mail::to($user->email)->send(new ResetAccount($user,$change));
        } catch (\Throwable $th) {
        }

        $request->session()->put('resent', true);

        return redirect('/');
    }
}
