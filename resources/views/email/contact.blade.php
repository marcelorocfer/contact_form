@component('mail::message')
# Olá, essa é uma mensagem de teste!

Nome: <b>{{ $reply_name }}</b>

Email: {{ $reply_email }}

Telefone: {{ $telefone }}

{{--Arquivo: {{ $arquivo }}--}}

Mensagem:
@component('mail::panel')
    {{ $message }}
@endcomponent

@endcomponent
