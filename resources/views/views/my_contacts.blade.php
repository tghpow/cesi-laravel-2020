@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Mes contacts</h1>
            </div>
        </div>
        <div class="row">
            @foreach($contacts as $contact)
                <div class="col-12 contact">
                    <h2>{{ $contact->subject }}</h2>
                    <div>
                        {{ $contact->message }}
                    </div>
                </div>
                <hr>
            @endforeach

            @if($contacts->count() == 0)
                <p>
                    <a href="{{ route('contact.get') }}">
                        Pas encore de contact ? Contactez nous ici:
                    </a>
                </p>
            @endif
        </div>
    </div>
@endsection