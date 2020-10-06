@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>{{ $post->title }}</h1>
                <div>
                    {{ $post->content }}
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-info" href="{{ route('post.form', [$post->id]) }}">Modifier</a>
            </div>
        </div>
    </div>
@endsection