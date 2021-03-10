<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\PremiumAccount;
use App\Models\PremiumDeactivationJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(){
        return view('weblog.login');    
    }

    function premium(){
        $posts = Post::where('premium', true)->get()->take(3);
        $user = Auth::user();
        return view('weblog.premiumsignon', ['premiumposts' => $posts, 'user' => $user]);   
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
        if($user->premium_id == null){
            $newPremiumId = $this->newPremiumAccount($user);
            $user->premium_id = $newPremiumId;
            $user->update();
        } else {
        }
        return redirect(route('user.premium'));
    }

    function premiumSignOff(){
        $user = Auth::user();
        if($user->premium_id != null){
            $job = new PremiumDeactivationJob();
            $job->premium_id = $user->premium_id;
            $job->deactivation_date = $user->premium->next_payment;
            $job->save();
            //$user->premium->deactivation()->save($job);
            $premium = $user->premium;
            //dd($premium);
            // $premium->deactivation_job = $job->id;
            dd($premium->deactivation());
            $premium->deactivation()->save($job);
        }
        return redirect(route('user.premium'));
    }

    function cancelPremiumSignOff(){
        $user = Auth::user();
        if($user->premium_id != null){
            if($user->premium->deactivation_job != null){
                $user->premium->deactivation()->delete();
                // $premiumAcc = $user->premium;
                // $deactivationJob = $user->premium->deactivation;
                // $deactivationJob->delete();
                // $premiumAcc->deactivation_job = null;
                // $premiumAcc->update();
            }
        }
        return redirect(route('user.premium'));
    }

    private function newPremiumAccount($user){
        $currentTime = Carbon::now();
        $premiumAcc = new PremiumAccount();
        $premiumAcc->subscribed_at = $currentTime;
        $premiumAcc->last_payment = $currentTime;
        $premiumAcc->next_payment = $currentTime->copy()->addMonthNoOverflow();
        $premiumAcc->user_id = $user->id;
        $premiumAcc->active = true;
        $premiumAcc->save();
        return $premiumAcc->id;
    }

}
