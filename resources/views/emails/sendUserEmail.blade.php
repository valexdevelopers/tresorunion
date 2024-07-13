<x-mail::message>
    Priority: {{ $userData['priority'] }}
    {{ $userData['message'] }}


{{-- <x-mail::button :url="''">

</x-mail::button> --}}

Thanks for banking with us,<br>
{{ config('app.name') }}
</x-mail::message>
