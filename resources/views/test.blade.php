<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
{{--<script>--}}
{{--    Pusher.logToConsole = true;--}}
{{--    var pusher = new Pusher('c379edfdce44785732d0', {--}}
{{--        cluster: 'ap2'--}}
{{--    });--}}

{{--    var channel = pusher.subscribe('booking');--}}
{{--    channel.bind('book.notification', function(data) {--}}
{{--        if (data.user_id === "{{ auth()->id() }}") {--}}
{{--            toastr.success('New Book Created', 'Success',  {--}}
{{--                timeOut: 0,--}}
{{--                extendedTimeOut: 0,--}}
{{--            });--}}
{{--        } else {--}}
{{--            console.error('Invalid data structure received:', data);--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
<style>
    /* Custom style for Toastr notifications */
    .toast-info .toast-message {
        display: flex;
        align-items: center;
    }
    .toast-info .toast-message i {
        margin-right: 10px;
    }
    .toast-info .toast-message .notification-content {
        display: flex;
        flex-direction: row;
        align-items: center;
    }
</style>
<script>
    Pusher.logToConsole = true;

    // Initialize Pusher
    var pusher = new Pusher('c379edfdce44785732d0', {
        cluster: 'ap2'
    });

    // Subscribe to the channel
    var channel = pusher.subscribe('booking');

    // Bind to the event
    channel.bind('book.notification', function(data) {
        console.log('Received data:', data); // Debugging line

        // Display Toastr notification with icons and inline content
        if (data.user_id === "{{ auth()->id() }}" || data.user_id === {{ auth()->id() }}) {
            toastr.success(
                `<div class="notification-content">
                        <i class="fas fa-user"></i> <span>  Service Date: ${data.message}</span>
                        <i class="fas fa-book" style="margin-left: 20px;"></i> <span> ${data.service_time}</span>
                    </div>`,
                'New Notification',
                {
                    closeButton: true,
                    progressBar: true,
                    timeOut: 0, // Set timeOut to 0 to make it persist until closed
                    extendedTimeOut: 0, // Ensure the notification stays open
                    positionClass: 'toast-top-right',
                    enableHtml: true
                }
            );
        } else {
            console.error('Invalid data received:', data);
        }
    });

    // Debugging line
    pusher.connection.bind('connected', function() {
        console.log('Pusher connected');
    });
</script>
