<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Topic extends Model
{
    protected $guarded = [ 
	
	];

	public function forum ()
	{
		return $this->belongsTo(Forum::class);
	}

	public function comments ()
	{
		return $this->hasMany (Comment::class)->paginate(5);
	}
	
	public function commentCount()
	{
		return count ($this->hasMany (Comment::class)->get());
	}

	public function owner ()
	{
		return User::where('id', $this->owner_id)->first();
	}

	public function addComment($description, $owner_id)
	{
		$this->comments()->create (compact('description', 'owner_id'));
	}
	
	public function updateTopic ($name, $description)
	{
		
		$this->update (compact ('name', 'description'));
	}
}
