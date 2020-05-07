<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'username','name', 'email', 'password',
    // ];
    protected $guarded= [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        //return "https://i.pravatar.cc/200?u=". $this->email;
        return asset($value ?: '/images/default-avatar.png');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    

    //tweetlerin görünümü
    public function timeline()
    {
        //return Tweet::where('user_id',$this->id)->latest()->get(); //sadece kullanıcının tweetlerini görüntüler
        //include all of the users tweets as well as the tweets of everyone they follow ...in descending order by date
        $friends = $this->follows()->pluck('id');
        //$friends->push($this->id);

        return Tweet::whereIn('user_id',$friends)
            ->orWhere('user_id', $this->id)
            ->withLikes()
            ->latest()->paginate(50);

    }

    //bir kullanıcının birden fazla tweeti olabilir
    public function tweets() {
        return $this->hasMany(Tweet::class)->latest(); 
    }

    public function path($append = '') {
        $path =  route('profile',$this->username);

        return $append ? "{$path}/{$append}": $path;
    }

}
