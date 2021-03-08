<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Carbon\CarbonInterface;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'user_id', 'imagepath', 'premium'];
    protected $with = ['categories'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('posted_at');
    }

    public function lastUpdatedAt(){
        $updated_at = Carbon::parse($this->updated_at);
        return Carbon::parse($this->updated_at)->diffForHumans(Carbon::now(), CarbonInterface::DIFF_RELATIVE_TO_NOW);
    }

    public function countComments(){
        return Comment::where('post_id', $this->id)->count();
    }

    public function premiumReadable(){
        return $this->premium ? 'Yes' : 'No';
    }

    public function getImageAttribute($value){
        return asset('storage/'.$value);
    }
}
