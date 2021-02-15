<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function user(){
        $this->belongsTo('App\Model\User');
    }

    public function post(){
        $this->belongsTo('App\Models\Post');
    }
}