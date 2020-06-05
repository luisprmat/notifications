@component('mail::message')
# Hola {{ $notifiable->name }}

Has recibido un mensaje de {{ $msg->sender->name }}

@component('mail::button', ['url' => route('messages.show', $msg)])
Click aquí para ver el mensaje
@endcomponent

Gracias por usar nuestra aplicación,<br>
**{{ config('app.name') }}**
@endcomponent
