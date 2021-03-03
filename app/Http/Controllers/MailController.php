<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Mail\Digest;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function sendDigest(){

        $posts = Post::get();
        $mailList = DB::table('mailing_list')->select('email')->get();

        foreach($mailList as $recipient){
            Mail::to($recipient)->send(new Digest($posts));
        }
    }
}
