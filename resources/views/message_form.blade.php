@extends('layouts.app_layout')

@section('content')
   <div class="row">
    <div class="col-sm-4 offset-4">
        @if ($errors->any)
           @foreach ($errors->all() as $error )
               <p class="text-danger"><small>{{$error}}</small></p>
           @endforeach

        @endif
        <form action="{{route('init')}}" method="post">
            @csrf
            <div class="form-group mt-3">
                <label for="text-from" class="from-label">From : </label>
                <input type="email" name="text-from" id="text-from" class="form-control" value="{{old('text-from')}}">
            </div>
            <div class="form-group mt-3">
                <label for="text-to" class="from-label">To : </label>
                <input type="email" name="text-to" id="text-to" class="form-control" value="{{old('text-from')}}">
            </div>
            <div class="form-group mt-3">
                <label for="text-message" class="from-label">Message : </label>
                <textarea name="text-message" id="text-message" rows="5" class="form-control" ></textarea>
            </div>
            <div class="text-center">
                <input type="submit" value="Send One Time Message" class="btn btn-primary mt-3">
            </div>
        </form>
    </div>
   </div>

@endsection
