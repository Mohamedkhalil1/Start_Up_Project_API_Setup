Hello {{$user->name}}
Thanks for register our website , you account is : 
username : 
password : 



@component('mail::message')
# Hello {{$user->name}}

You have been registered successfully on the Training ROI App, use the following Email and password for Signin.

Email: {{$user->email}}
Password: {{$user->password}}

You can signin through our website %Link to web site% or through our mobile Application which it available on IOS %IOS Link% and Android %Android Link% 


Thanks,<br>
{{ 'Your Training ROI team' }}
@endcomponent
