<?php
namespace App;

use App\Applicant;
use App\Managers;
use App\Posting;
use App\ApplyJob;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
/**
* The attributes that are mass assignable.
*
* @var array
*/
protected $fillable = [
'name', 'email', 'password','role'
];
/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
'password', 'remember_token',
];

public function applicants(){
  return $this->hasOne(Applicant::class);
}
public function managers(){
  return $this->hasOne(Managers::class);
}
public function applyjobs(){
  return $this->hasMany(ApplyJob::class);
}
public function postings(){
  return $this->hasMany(Posting::class);
}

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

}
