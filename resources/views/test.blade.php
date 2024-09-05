<!DOCTYPE html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('c379edfdce44785732d0', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('booking');
    channel.bind('book.notification', function(data) {
        if (data.user_id === "{{ auth()->id() }}") {
            toastr.success('New Book Created', 'Service Date: ' + data.service_date, 'Service Time: ' + data.service_time, {
                timeOut: 0,
                extendedTimeOut: 0,
            });
        } else {
            console.error('Invalid data structure received:', data);
        }
    });
</script>
