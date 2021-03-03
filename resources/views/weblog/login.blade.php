@extends('../layouts/app')

@section('content')
<h1>Login</h1>

<form method="POST" action="{{route('login')}}">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Enter username">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
    </div>

    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
    </div>
    @if($errors->first())
        <p class="help-block">{{$errors}}</p>
    @endif

    <button type="submit" class="btn btn-primary">Log in</button>
</form>
@endsection