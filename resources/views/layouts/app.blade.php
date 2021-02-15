<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h3>Header</h3>
    <div class="container">
        <ul class="list-unstyled">
            <li><a href="{{route('weblog.index')}}">Home</a></li>
            <li><a href="{{route('weblog.create')}}">Nieuw bericht</a></li>
            <li><a href="{{route('weblog.login')}}">Login</a></li>
            <li><a href="{{route('weblog.premium')}}">Premium</a></li>
            <li><a href="{{route('weblog.written')}}">Geschreven</a></li>
        </ul>
    </div>
    </div>
    <div class="container">
        @yield ('content')
    </div>
    <div class="container">
    <h3>Footer</h3>
    </div>
</body>
</html>