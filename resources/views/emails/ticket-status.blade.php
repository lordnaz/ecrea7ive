@component('mail::message')
# Hi!

Kindly refer below Ticket details and login through our system to proceed.

@component('mail::panel')
Ticket ID : # {{ $details['ticket_id'] }}
<br>
Status: # {{ $details['ticket_status'] }}
<br>
Requester: {{ $details['pic_name'] }}
<br>
Email: {{ $details['pic_email'] }}
@endcomponent


@component('mail::button', ['url' => '/login', 'color' => 'success'])
Login
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
