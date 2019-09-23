<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{

    protected $guarded = [
    ];

    public function topic()
    {
    	$this->belongsTo(Topic::class);
    }

    public function owner()
    {
    	return User::where('id', $this->owner_id)->first();
    }
	
}
