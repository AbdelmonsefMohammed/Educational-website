@component('mail::message')
# Contact Form Message

#Username: {{$name}}

#Subject: {{$subject}}

#Email: {{$email}}

#Message: {{$message}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
