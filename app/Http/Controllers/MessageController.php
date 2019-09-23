<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;
use App\StatBlock;

class MessageController extends Controller
{
	
	function __construct ()
	{
		$this->middleware('auth');
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$users = User::all();
        $messages = Message::where('to', auth()->id())->get();
		
		$statWreel = StatBlock::allStats();
		return view ('messages', ['messages' => $messages], ['users' => $users, 'stats' => $statWreel]);
		
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
    public function store(Request $request)
    {
		$okay = $request->validate ([
		'subject' => ['required', 'min:3'],
		'description' => 'required'
		]);
		
		$okay['read'] = 'read';
		$okay['to'] = request ('to');
		$okay['from'] = auth()->id();

        Message::create($okay);
		return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Message $message)
    {
	if ($message->read == "read")
		{
			$message->update(['read' => 'unread']);
		} else {
			$message->update(['read' => 'read']);
		}
		
		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
		return back();
    }
}
