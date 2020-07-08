
@component('mail::message')
# Hello {{$user->name}}

Use the code below to reset your Training ROI password for your {{$user->email  }} account.

Reset Code : {{$user->code}}

If you didn’t ask to reset your password, you can ignore this email.

Thanks,<br>
{{ 'Your Training ROI team' }}
@endcomponent
