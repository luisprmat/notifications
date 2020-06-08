@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <h4 class="card-header">{{ $post->title }}</h4>
                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
