@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-info" href="{{ route('post.form', [$post->id]) }}">Modifier</a>
            </div>
            <div class="card-body">
                <h1>{{ $post->title }}</h1>
                <div>
                    {{ $post->content }}
                </div>
            </div>
            <div class="card-footer">
                <h2>Commentaires</h2>
                <div id="comments">
                    <form action="{{ route('comment.store', $post->id) }}" method="post">
                        @csrf
                        <p><b>Ecrire un commentaire</b></p>
                        <div class="form-group">
                            <textarea name="content" class="form-control" id="content" placeholder="Votre message..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Commenter</button>
                    </form>
                    <hr>
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <div>
                                <span class="small">
                                    ecris le {{ $comment->created_at->format('d/m/Y h:i:s') }}
                                </span>
                            </div>
                            <div>
                                {{ $comment->content }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection