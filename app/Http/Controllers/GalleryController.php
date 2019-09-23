<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\StatBlock;

class GalleryController extends Controller
{
	
	public function index ()
	{
		$stats = StatBlock::allStats();
		$files = Storage::files ('pic-uploads');
		return view ('gallery', ['files' => $files], ['stats' => $stats]);
	}
	
	public function store (Request $request)
	{
		
		$request->picture->store('pic-uploads');
		return back();
	}
	
}