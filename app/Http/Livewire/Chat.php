<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chat As chats;
use App\Models\User;
use App\Events\Chat As ChatEvent;

use Auth;
class Chat extends Component
{
    public $fetch_my_messages = [], $fetch_others_messages = [], $message, $received_id, $chat_open = false;

    private function resetInputFields(){
        $this->message = '';
    }

    public function fetch($id)
    {
        $this->received_id = $id;
        $this->chat_open = true;
        $this->fetch_my_messages = Auth::user()->messages()->where('chat_id', $id)->get();
        //$this->fetch_others_messages = chats::where('chat_id', $id)->with('messageable')->where('messageable_id', Auth::id())->get();

        // $this->dispatchBrowserEvent('alert',[
        //     'type'=>'success',
        //     'message'=>"$id Created Successfully!!"
        // ]);
    }

    public function store()
    {
        $validated = $this->validate([
            'message' => 'required',
        ]);

        $user = Auth::user();

        $message = $user->messages()->create([
            'message' => $this->message,
            'chat_id' => $this->received_id 
        ]);

        broadcast(new ChatEvent($user, $message))->toOthers();

        $this->resetInputFields();
    }
    public function render()
    {
        $fetch_my_messages = $this->fetch_my_messages ;
        $fetch_others_messages = $this->fetch_others_messages ;
        $active_users = User::where('id', '<>' ,auth()->id())->take(7)->get();
        return view('livewire.index', compact('fetch_my_messages', 'fetch_others_messages', 'active_users'));
    }
}
