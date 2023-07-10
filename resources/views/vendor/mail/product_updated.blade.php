@component('mail::message')
<h2>Hello ,</h2>
<p>The email is a sample email for Laravel Tutorial: How to Send an Email using Laravel 8 from
@component('mail::button', ['url' => '/'])
Bacancy Technology
@endcomponent
</p>

<p>Visit
@component('mail::button', ['url' => '/'])
Laravel Tutorials
@endcomponent and learn more about the Laravel framework.
</p>


Happy coding!<br>

Thanks,<br>
{{ config('app.name') }}<br>
Laravel Team.
@endcomponent
