<x-mail::message>
# New Maintenance Request

You just recieved a new maintenance request.

Maintenance Phone Number: {{$maintenance->phone_number}}

Maintenance Machine Type: {{$maintenance->machine}}

<x-mail::button :url="route('dashboard.index')">
Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
