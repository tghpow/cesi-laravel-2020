@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Mes commentaires</h1>
            </div>
            <div class="card-body">
                @foreach($user->comments as $comment)
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
@endsection