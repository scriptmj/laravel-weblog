<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\PremiumAccount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(){
        return view('weblog.login');    
    }

    function premium(){
        $posts = Post::where('premium', true)->get()->take(3);
        return view('weblog.premiumsignon', ['premiumposts' => $posts]);    
    }

    function digest(){
        return view('weblog.digest');
    }

    function unsubscribe(){
        $user = Auth::user();
        $user->digest = false;
        $user->update();
        return redirect(route('user.digest'));
    }
    
    function subscribe(){
        $user = Auth::user();
        $user->digest = true;
        $user->update();
        return redirect(route('user.digest'));
    }

    function premiumSignOn(){
        $user = Auth::user();
        if($user->premium() == null){
            $newPremiumId = $this->newPremiumAccount($user);
            $user->premium_id = $newPremiumId;
        } else {
            dd('error');
        }
    }

    private function newPremiumAccount($user){
        $currentTime = Carbon::now();
        $premiumAcc = new PremiumAccount();
        $premiumAcc->subscribed_at = $currentTime;
        $premiumAcc->last_payment = $currentTime;
        $premiumAcc->next_payment = $currentTime->addMonth();
        $premiumAcc->user_id = $user->id;
        $premiumAcc->save();
        return $premiumAcc->id;
    }
}
