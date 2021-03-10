<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Mail\Digest;
use App\Mail\PremiumDigest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class MailController extends Controller
{
    public function sendDigest(){

        $lastWeek = Carbon::now()->subDays(7);
        $posts = Post::where('created_at', '>', $lastWeek)
            ->orderBy('created_at', 'DESC')
            ->get();
        $premiumposts = new Collection;
        foreach($posts as $post){
            if($post->premium){
                $premiumposts->push($post);
            }
        }
        $mailList = DB::table('users')->where('digest', true)->get();

        if($posts->first() !== null){
            foreach($mailList as $recipient){
                if($recipient->premium_id == null){
                    Mail::to($recipient->email)->send(new Digest($posts, $recipient, $premiumposts));
                } else {
                    Mail::to($recipient->email)->send(new PremiumDigest($posts, $recipient));
                }
            }
        }
    }
}
