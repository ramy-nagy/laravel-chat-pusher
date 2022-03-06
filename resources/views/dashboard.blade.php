<x-app-layout>
    <div class="container mt-5">
        <div class="row clearfix">
            <div class="col-lg-12">
                @livewire('chat')
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher('42e64177c638fa77839e', {
            cluster: 'eu'
        });
    
        var channel = pusher.subscribe('chat');
        channel.bind('chat-event', function(data) {
            alert(JSON.stringify(data));
        });
    </script>
    @endpush
</x-app-layout>