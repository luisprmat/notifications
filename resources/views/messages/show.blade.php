@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title mb-0">Mensaje</h2>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $message->body }}</p>
                </div>
                <div class="card-footer">
                    <small>Enviado por <i>{{ $message->sender->name }}</i></small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
