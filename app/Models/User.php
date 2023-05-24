<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Image;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

   public function setAvatarAttribute($avatar){

        $image = $avatar;
        $input['imagename'] = time().'.'.$image->extension();

        $filePath = public_path('/storage/avatar');
        $img = \Intervention\Image\Facades\Image::make($image->path());
        $img->resize(50, 50, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);


        $this->attributes['avatar'] = '/storage/avatar/'.$input['imagename'];
    }

    public function setProfileAttribute($profile){

        $image = $profile;
        $input['imagename'] = time().'.'.$image->extension();

        $filePath = public_path('/storage/profile_picture');
        $img = \Intervention\Image\Facades\Image::make($image->path());
        $img->resize(150, 125, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);


        $this->attributes['profile'] = '/storage/profile_picture/'.$input['imagename'];
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function reactions(){
        return $this->hasMany(Reaction::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function myFollowing(){
        return $this->belongsToMany(User::class,'follows','follower_id');
    }

    public function myFollowers(){
        return $this->belongsToMany(User::class,'follows','user_id')->withPivot('follower_id');
    }

    public function actions(){
        return $this->hasMany(Action::class);
    }

}
