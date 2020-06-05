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
                            <select class="custom-select @error('recipient_id') is-invalid @enderror" name="recipient_id">
                                <option value="">Seleccione el usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('recipient_id') == $user->id ? 'selected' : ''}}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            @error('recipient_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea name="body"
                                class="form-control @error('body') is-invalid @enderror"
                                placeholder="Escribe aquí tu mensaje"
                            >{{ old('body') }}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
