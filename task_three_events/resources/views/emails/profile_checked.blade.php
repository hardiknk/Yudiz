@component('mail::message')
# Introduction
Hii {{ $user->name }}

Someone Checked Your Profile 
For More Info visit Our Sites

@component('mail::button', ['url' => 'www.google.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
