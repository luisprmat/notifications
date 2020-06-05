@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">Enviar mensaje</h3>
                <form method="POST" action="{{ route('messages.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <select class="custom-select" name="recipient_id">
                                <option value="">Seleccione el usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea name="body"
                                class="form-control"
                                placeholder="Escribe aquí tu mensaje"
                            ></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
