@component('mail::message')
# Password recovery

Click on the following link to recover your password.
{{$url}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
