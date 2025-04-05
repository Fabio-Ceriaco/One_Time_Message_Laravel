@extends('layouts.app_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h5>Was sent an confirmation email to <strong>{{$email}}</strong> </h5>
            <p>Verify your inbox or SPAM.</p>
            <div class="my-5">
                <a href="{{route('index')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>


@endsection
