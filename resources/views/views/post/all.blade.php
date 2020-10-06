@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            @foreach($posts as $post)
                <div class="card">
                    <div class="card-body">
                        <h1>{{ $post->title }}</h1>
                        <div>
                            {{ $post->content }}
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('post.get', $post->id) }}" class="btn btn-primary">
                            Voir
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <hr>
        <div class="row">
            <div class="alert-primary">
                <a href="{{ route('post.form') }}" class="btn btn-success">
                    Créer un post
                </a>
            </div>
        </div>
    </div>
@endsection