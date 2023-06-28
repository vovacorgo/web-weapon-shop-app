<x-mail::message>
    # Ваш обліковий запис успішно створено! Ваш пароль: {{ $password }}

<x-mail::button :url="route('login')"> Log In </x-mail::button>

Дякую за реєстрацію,<br />
{{ config('app.name') }}
</x-mail::message>
