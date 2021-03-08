<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Mail\Digest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MailController extends Controller
{
    public function sendDigest(){

        $lastWeek = Carbon::now()->subDays(7);
        $posts = Post::where('created_at', '>', $lastWeek)->orderBy('created_at', 'DESC')->get();
        $mailList = DB::table('users')->select('email')->where('digest', true)->get();

        if($posts->first() !== null){
            foreach($mailList as $recipient){
                Mail::to($recipient)->send(new Digest($posts));
            }
        }
    }
}
