<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Lib\Relation\UserAccessRelation;
use App\Lib\Relation\UserGroupRelation;

class User extends Authenticatable
{

    use Notifiable,
        UserAccessRelation,
        UserGroupRelation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function($user) {
            $user->verify_token = hash_hmac("sha256", $user->id . $user->email . strtotime('now'), env('APP_KEY'));
        });
    }

    /**
     * Return true if user is already verified
     * @return boolean 
     */
    public function isVerified()
    {
        return $this->verified;
    }

    /**
     * Verify user registration and clear registration token
     * @return \App\User
     */
    public function verify()
    {
        $this->verified = true;
        $this->verify_token = null;
        $this->save();

        return $this;
    }

}
