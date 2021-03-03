@extends('../layouts/app')

@section('content')

<h1>Register new user</h1>

<form method="POST" action="{{route('register')}}">
    @csrf
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Enter username">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        <p class="text-danger" id="password-username"></p>
        <p class="text-danger" id="password-length"></p>
        <p class="text-danger" id="password-validity"></p>
    </div>

    <div class="form-group">
        <label for="password">Repeat password</label>
        <input type="password" class="form-control" id="password-repeat" name="password_confirmation" placeholder="Repeat password">
        <p class="text-danger" id="repeat-password-feedback"></p>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter E-mail">
    </div>

    @if($errors->first())
        <p class="help-block">{{$errors}}</p>
    @endif

    <button type="submit" class="btn btn-primary">Log in</button>
</form>

<script src="../../js/register.js"></script>
@endsection