@extends('layouts.app_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h5>This message was send from <strong>{{$email}}</strong> </h5>
            <p class="alert alert-danger p-3 text-center">This message only can be readed one time.</p>
            <h4>{{$message}}</h4>
            <div class="my-5">
                <a href="{{route('index')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</div>


@endsection
