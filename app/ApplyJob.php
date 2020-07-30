<?php

namespace App;
use App\User;
use App\Applicant;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function applyjobs(){
        return $this->hasMany(Applicant::class);
    }
}
