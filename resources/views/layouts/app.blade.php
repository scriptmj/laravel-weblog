<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    
    <title>Weblog</title>
</head>
<body>
    <div class="jumbotron">
        <h1 class="display-4 m-5">Laravel Weblog</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{Request::path() === '/' ? 'active' : ''}}" href="{{route('weblog.index')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path() === 'create' ? 'active' : ''}}" href="{{route('post.create')}}">New post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path() === 'login' ? 'active' : ''}}" href="{{route('user.login')}}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path() === 'premium' ? 'active' : ''}}" href="{{route('user.premium')}}">Premium</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{Request::path() === 'written/2' ? 'active' : ''}}" href="{{route('user.written', 2)}}">Written</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        @yield ('contentheader')
        @yield ('content')
    </div>
    <div class="jumbotron">
        <p class="lead">Made by MJ</p>
    </div>
    <script src="../../js/app.js"></script>
</body>
</html>