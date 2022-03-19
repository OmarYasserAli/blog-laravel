<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


	public function User(){
		return $this->belongsTo(User::class);
	}
	public function Comments(){
		return $this->HasMany(Comment::class);
	}
	public function Hashtags(){
		return $this->HasMany(Hashtag::class);
	}
    public function likes()
    {

    	return $this->belongsToMany(User::class,'likes');
    }
     public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    	
  	  	
}
