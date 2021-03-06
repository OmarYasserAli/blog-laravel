<?php

namespace App;

use App\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     public function posts()
    {
        return $this->HasMany(Post::class);
           
    }
    public function postsCount()
    {
        return $this->posts()->count();
    }
        public function likes()
    {

        return $this->belongsToMany(User::class,'likes');
    }
    public function likesCount()
    {
        return $this->likes()->count();
    }
    public function Comments()
    {
        return $this->HasMany(Comment::class);
           
    }
    public function commentsCount()
    {
        return $this->comments()->count();
    }


}
