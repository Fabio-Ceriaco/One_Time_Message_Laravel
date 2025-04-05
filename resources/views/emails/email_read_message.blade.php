<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

</head>
<body>
        <h4>{{config('app.name')}}</h4>
        <p>You have a message to read in {{config('app.name')}} .</p>
        <p>Important: youonly can read the messagem one time.</p>
        <p><a href="{{route('read', ['purl' => $purl])}}">Read Message</a></p>
</body>
</html>
