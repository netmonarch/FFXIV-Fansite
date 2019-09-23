<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatBlock extends Model
{
    //
	
	public static function allStats()
	{	
		$statWreel[0] = count (Forum::all());
		$statWreel[1] = count (Topic::all());
		$statWreel[2] = count (Comment::all());
		$statWreel[3] = count (User::all());
		
		return $statWreel;
	}
}
