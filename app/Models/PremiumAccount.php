<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumAccount extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'deactivation_job'];
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function deactivation(){
        return $this->hasOne('App\Models\PremiumDeactivationJob', 'premium_id', 'deactivation_job');
    }
}
