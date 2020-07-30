<?php

namespace App;

use App\User;
use App\Managers;
use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function applyjobs(){
       return  $this->hasMany(Managers::class);
    }
}
