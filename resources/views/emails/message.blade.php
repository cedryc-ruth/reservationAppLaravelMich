@component('mail::message')
# Message de la part de {{ $details->name }}

<b>Adresse email du client:</b> <a href = "mailto: {{ $details->email }}">{{ $details->email }}</a> <br>
<b>Sujet du message:</b> {{ $details->subject }} <br>
<b>Message du client:</b> <br>

{{ $details->message }}

<hr><br>
{{ config('app.name') }} SENDMAIL SYSTEM
@endcomponent
