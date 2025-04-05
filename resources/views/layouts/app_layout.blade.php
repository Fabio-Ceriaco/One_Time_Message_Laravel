<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <title>{{config('app.name')}}</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center my-5">{{config('app.name')}}</h1>
                @yield('content')

                <div class="text-center my-5">
                    <small>Created by Fábio Ceriaco &copy; {{date('Y')}}</small>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
