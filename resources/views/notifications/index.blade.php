@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Notificaciones</h1>
        <div class="row">
            <div class="col-md">
                <h2>No leídas</h2>
                <ul class="list-group">
                    @foreach ($unreadNotifications as $unreadNotification)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="{{ $unreadNotification->data['link'] }}">
                                {{ $unreadNotification->data['text'] }}
                            </a>
                            <form method="POST" action="{{ route('notifications.read', $unreadNotification->id) }}">
                                @csrf @method('PATCH')
                                <button class="btn btn-secondary btn-sm"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    title="Marcar como leída"
                                ><i class="fas fa-check fa-fw"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md">
                <h2>Leídas</h2>
                <ul class="list-group">
                    @foreach ($readNotifications as $readNotification)
                        <li class="list-group-item d-flex justify-content-between">
                            <a href="{{ $readNotification->data['link'] }}">
                                {{ $readNotification->data['text'] }}
                            </a>
                            <form method="POST" action="{{ route('notifications.destroy', $readNotification->id) }}">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    title="Eliminar"
                                ><i class="fas fa-times fa-fw"></i>
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection
