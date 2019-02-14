@component('mail::message')
Hello!<br>
You will receive a notification from the form "contact the Wealthman team".<br>
<br><br>
Email/Phone : {{ $email_phone ?? '&mdash;' }}<br>
Name : {{ $name ?? '&mdash;' }}<br>
Message : {{ $comment ?? '&mdash;' }}<br>
<br><br><br><br><br><br>
@endcomponent
