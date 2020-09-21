@component('mail::message')

## Nome: {{ $reply_name }}

## Email: {{ $reply_email }}

## Telefone: {{ $telefone }}

## Mensagem:
@component('mail::panel')
#    {{ $message }}
@endcomponent

##### Enviado em: {{ $criado_em }} pelo IP: {{ $seu_ip }}

@endcomponent
