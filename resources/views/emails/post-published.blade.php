@component('mail::message')
# Hola {{ $user->name }},

Hemos publicado un nuevo post.

@component('mail::button', ['url' => route('posts.show', $post)])
{{ $post->title }}
@endcomponent

Gracias por leernos!!<br>
{{ config('app.name') }}
@endcomponent
