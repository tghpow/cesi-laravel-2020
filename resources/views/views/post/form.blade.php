@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Créer ou modifier un post</h1>
            </div>
            <div class="card-body">
                <form action="{{ $action }}" method="post">
                    @csrf
                    @if(!$is_creating)
                        <input type="hidden" name="_method" value="put" />
                    @endif
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" id="title" placeholder="Titre..." />
                        </div>
                        <div class="form-group">
                            <textarea name="content" class="form-control" id="content" placeholder="Votre message..."></textarea>
                        </div>
                    <button type="submit" class="btn btn-dark">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
@endsection