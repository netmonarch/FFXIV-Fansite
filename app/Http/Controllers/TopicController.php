<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Topic;
use App\Forum;
use App\User;
use App\Comment;
use App\StatBlock;

class TopicController extends Controller
{

    function __construct ()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Forum $forum )
    {
		
		$okay = request()->validate ([
		'name' => ['required', 'min:3', 'max:100'],
		'description' => ['required', 'min:10']
		]);
		
		$okay['owner_id'] = auth()->id();
		$okay['forum_id'] = $forum->id;
		Topic::create($okay);
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Topic $topic )
    {
        $stats = StatBlock::allStats();
        return view ('thread.t-show', compact('topic', 'user'), ['stats' => $stats]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
		$topic = Topic::find (request('eid'));
		$topic->name = request('etitle');
		$topic->description = request('edesc');
		$topic->save();
		
        return redirect('/topic/'.request('eid'));
	}
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
		
        $topic->delete();
		return back();
    }
}
