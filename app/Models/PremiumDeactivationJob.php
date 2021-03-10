<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumDeactivationJob extends Model
{
    use HasFactory;

    protected $fillable = ['premium_id', 'deactivation_date'];

    public function premium(){
        return $this->belongsTo('App\Models\PremiumAccount', 'deactivation_job', 'premium_id');
    }
}
