<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Forum extends Model
{
    protected $guarded = [ 
	
	];

	public function topics ()
	{
		return $this->hasMany(Topic::class)->paginate(10);
	}
	
	public function topicCount()
	{
		return $this->hasMany(Topic::class);
	}

	public function addTopic ($name, $description, $owner_id)
	{

		$this->topics()->create (compact('name', 'description', 'owner_id'));
	}
}
