@extends('../../layouts/app')

@section('content')
<h1>Premium content</h1>

@if(!$user->premium_id)
<!-- If the user has never signed up for Premium -->
    <p>Become a premium member for exclusive access to premium content.</p>
    <p>Some examples of premium articles:</p>
    @forelse($premiumposts as $post)
        <h4>{{$post->title}}</h4><br />
        @empty
        <p>No posts yet, but check back soon!</p>
    @endforelse
    <br />
    <h4>Sign up now!</h4>
    <form action="{{route('user.premiumsignon')}}" method="post">
    @csrf
        <p>Credit card information:</p>
        <div class="row">
            <div class="col-md-4">
                <input type="text" class="form-control" name="ccname" placeholder="Credit card name" value= "{{old('ccname')}}">
                @error('ccname')
                <p class="help-block">{{$errors->first('ccname')}}</p>
                @enderror
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" name="ccnumber" placeholder="Credit card number" pattern="[0-9]{16}" maxlength="16" value= "{{old('ccnumber')}}">
                @error('ccnumber')
                <p class="help-block">{{$errors->first('ccnumber')}}</p>
                @enderror
            </div>
            <div class="col-md-1">
                <input type="number" class="form-control" name="ccexpdatemm" placeholder="MM" pattern="[0-9]{2}" maxlength="2" min="1" max="12" value= "{{old('ccexpdatemm')}}">
                @error('ccexpdatemm')
                <p class="help-block">{{$errors->first('ccexpdatemm')}}</p>
                @enderror
            </div>
            /
            <div class="col-md-1">
                <input type="number" class="form-control" name="ccexpdateyy" placeholder="YY" pattern="[0-9]{2}" maxlength="2" max="99" value= "{{old('ccexpdateyy')}}">
                @error('ccexpdateyy')
                <p class="help-block">{{$errors->first('ccexpdateyy')}}</p>
                @enderror
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="cccvv" placeholder="CVV" inputmode="numeric" pattern="[0-9]{3,4}" maxlength="4" value= "{{old('cccvv')}}">
                @error('cccvv')
                <p class="help-block">{{$errors->first('cccvv')}}</p>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success">Sign up for premium</button>
    </form>
@elseif($user->premium->active)
<!-- If the user has signed up and their account is active -->
    <p>You are currently signed up for premium content since: {{$user->premium->subscribed_at}}.</p>
    @if($user->premium && $user->premium->active && $user->premium->deactivation_job == null)
    <!-- If the user has not cancelled their subscription -->
        <p>Your next payment is due: {{$user->premium->next_payment}}.</p>
        <br />

        <p>Do you wish to unsubscribe? Your premium account will stay active until next payment date.</p>
        <form action="{{route('user.premiumsignoff')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">End premium subscription</button>
        </form>
    @endif

    @if($user->premium && $user->premium->active && $user->premium->deactivation_job != null)
    <!-- If the user has cancelled their subscription -->
    <p>Your subscription will end on {{$user->premium->currentDeactivationJob()->first()->deactivation_date}}</p>

    <form action="{{route('user.cancelpremiumsignoff')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-success">Resubscribe</button>
    </form>

    @endif

@elseif(!$user->premium->active)
<!-- If the user cancelled their subscription and their premium is no longer active -->
    <p>Your premium account ended on: {{$user->premium->next_payment}}</p>
    <p>Do you wish to reactivate your account?</p>
    <p>Your credit card number is: xxxx-xxxx-xxxx-x{{$user->premium->getMaskedCCNumber()}}</p>
    <form action="{{route('user.premiumsignon')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-success">Resubscribe</button>
    </form>
@endif

@endsection