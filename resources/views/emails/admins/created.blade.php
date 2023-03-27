<x-mail::message>
# Welcome {{$name}} to Quip Solution

<x-mail::panel>
Your Login Password: {{$password}}
</x-mail::panel>

<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
