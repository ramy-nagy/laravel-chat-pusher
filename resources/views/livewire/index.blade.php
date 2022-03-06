<div class="card chat-app row col-md-12">
    <div id="plist" class="people-list col-md-4">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Search...">
        </div>
        <ul class="list-unstyled chat-list mt-2 mb-0">
            @php
                $str = "nagy-ramy";
            @endphp
            @forelse ($active_users as $active_user)
            <button wire:click="fetch('{{$active_user->id}}')">
                <li class="clearfix">
                    <img src="https://i.pravatar.cc/150?u={{$active_user->email}}" alt="avatar">
                    <div class="about">
                        <div class="name">{{$active_user->name ?? ''}}</div>
                        <div class="status"> <i class="fa fa-circle offline"></i> left 7 mins ago </div>
                    </div>
                </li>
            </button>
            @empty

            @endforelse
        </ul>
    </div>
    {{-- @if($chat_open) --}}
    <div class="chat col-md-8">

        <div class="chat-header clearfix">
            <div class="row">
                <div class="col-lg-6">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                    </a>
                    <div class="chat-about">
                        <h6 class="m-b-0">Aiden Chavez</h6>
                        <small>Last seen: 2 hours ago</small>
                    </div>
                </div>
                <div class="col-lg-6 hidden-sm text-right">
                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                </div>
            </div>
        </div>
        <div class="chat-history">
            <ul class="m-b-0">
                @forelse ($fetch_others_messages as $others_messages)
                <li class="clearfix">
                    <div class="message-data clearfix">
                        <span class="message-data-time float-right">{{$others_messages->created_at->diffForHumans() ?? ''}}</span>
                        {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar"> --}}
                    </div>
                    <div class="message other-message float-right">{{$others_messages->message ?? ''}}</div>
                </li>
                @empty
                    
                @endforelse

                @forelse ($fetch_my_messages as $message)
                <li class="clearfix">
                    <div class="message-data">
                        <span class="message-data-time">{{$message->created_at->diffForHumans() ?? ''}}</span>
                    </div>
                    <div class="message my-message">{{$message->message ?? ''}}</div>
                </li>
                @empty
                    
                @endforelse

            </ul>
        </div>
        <div class="chat-message clearfix">
            <form>
                <input type="hidden" readonly wire:model="received_id">
                <div class="input-group mb-0">
                    <div class="input-group-prepend">
                        <span class="">
                            <button wire:click.prevent="store()" class="btn btn-success"><i
                                    class="fa fa-send"></i></button>
                        </span>
                    </div>
                    <input type="text" class="form-control" wire:model="message" placeholder="Enter text here...">
                </div>
            </form>
        </div>
    </div>
    {{-- @endif --}}
</div>