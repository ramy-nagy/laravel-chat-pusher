<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use Auth;
use App\Events\Chat as chat_event;

class ChatController extends Controller
{
    public function __construct()
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
        $fetch_my_messages = Auth::user()->messages()->get();
        $active_users = User::where('id', '<>' ,auth()->id())->latest()->take(7)->get();
        //$fetch_others_messages = chats::where('chat_id', $this->received_id)->with('messageable')->where('messageable_id', Auth::id())->get();
        return view('dashboard', compact('fetch_my_messages', 'active_users'));
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
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $request->message,
            'chat_id' => $request->received_id 
        ]);
        broadcast(new chat_event($user, $message))->toOthers();
        return "true";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChatRequest  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
