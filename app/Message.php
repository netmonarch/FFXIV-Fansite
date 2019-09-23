<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];
	
    public function to()
    {
    	return User::where('id', $this->to)->first();
    }
	
	public function from()
	{
		return User::where('id', $this->from)->first();
	}
	
}
