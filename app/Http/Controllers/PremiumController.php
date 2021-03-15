<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumAccount;
use App\Models\PremiumDeactivationJob;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PremiumController extends Controller
{
    function premium(){
        $posts = Post::where('premium', true)->get()->take(3);
        $user = Auth::user();
        return view('weblog.premiumsignon', ['premiumposts' => $posts, 'user' => $user]);   
    }

    function premiumSignOn(){
        $user = Auth::user();
        if($user->premium_id == null){
            $creditcard = $this->validateCreditCard();
            $newPremiumId = $this->newPremiumAccount($user);
            $user->premium_id = $newPremiumId;
            $user->update();
        } elseif($user->premium->active == false){
            $user->premium->active = true;
            $currentTime = Carbon::now();
            $user->premium->last_payment = $currentTime;
            $user->premium->next_payment = $currentTime->copy()->addMonthNoOverflow();
            $user->premium->update();
        }
        return redirect(route('user.premium'));
    }

    function premiumSignOff(){
        $user = Auth::user();
        if($user->premium_id != null){
            $jobId = $this->newPremiumDeactivationJob($user->premium_id, $user->premium->next_payment);
            $user->premium->deactivation_job = $jobId;
            $user->premium->update();
        }
        return redirect(route('user.premium'));
    }

    function cancelPremiumSignOff(){
        $user = Auth::user();
        if($user->premium_id != null){
            if($user->premium->deactivation_job != null){
                $job = $user->premium->currentDeactivationJob()->first();
                $job->delete();
                $user->premium->deactivation_job = null;
                $user->premium->update();
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
        $premiumAcc->ccname = request('ccname');
        $premiumAcc->ccnumber = request('ccnumber');
        $premiumAcc->ccexpdatemm = request('ccexpdatemm');
        $premiumAcc->ccexpdateyy = request('ccexpdateyy');
        $premiumAcc->cccvv = request('cccvv');
        $premiumAcc->save();
        return $premiumAcc->id;
    }

    private function newPremiumDeactivationJob($premiumId, $deactivationDate){
        $job = new PremiumDeactivationJob();
        $job->premium_id = $premiumId;
        $job->deactivation_date = $deactivationDate;
        $job->save();
        return $job->id;
    }

    private function validateCreditCard(){
        return request()->validate([
            'ccname' => 'required|string|min:2',
            'ccnumber' => 'required|integer|digits:16',
            'ccexpdatemm' => 'required|integer|digits_between:1,2',
            'ccexpdateyy' => 'required|integer|digits:2',
            'cccvv' => 'required|integer|digits_between:3,4',
        ]);
    }
}
