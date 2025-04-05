<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

</head>
<body>
        <h4>{{config('app.name')}}</h4>
        <p>Click on link to confirm the send.</p>
        <p><a href="{{route('confirm', ['purl' => $purl])}}">Confirm Message</a></p>
</body>
</html>
