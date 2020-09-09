@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Contactez-nous</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="card col-12">
                <div class="card-body">
                    <form method="POST" action="{{ route('contact.post') }}" class='form-horizontal' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-xs-2 control-label">Sujet</label>
                            <div class="col-xs-10">
                                <input type="text" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Sujet" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-2 control-label">Genre</label>
                            <div class="col-xs-10">
                                <select class="form-control" name="genre">
                                    <option value="" disabled>Selectionnez</option>
                                    @foreach($genres as $genre)
                                        <option value="{{ $genre }}">{{ $genre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-2 control-label">Email</label>
                            <div class="col-xs-10">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-2 control-label">Message</label>
                            <div class="col-xs-10">
                                <textarea name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection