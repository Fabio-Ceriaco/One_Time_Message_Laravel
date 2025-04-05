<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

</head>
<body>
        <h4>{{config('app.name')}}</h4>
        <p>The receiver <strong>{{$email_receiver}} </strong>read your message.</p>
        <p>The message was read at: <strong>{{$datetime_readed}}</strong></p>
</body>
</html>
