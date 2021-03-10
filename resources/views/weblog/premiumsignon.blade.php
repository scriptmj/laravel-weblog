@extends('../../layouts/app')

@section('content')
<h1>Premium content</h1>

@if(!$user->premium_id)
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
<button type="submit" class="btn btn-success">Sign up for premium</button>
</form>
@else

<p>You are currently signed up for premium content since: {{$user->premium->subscribed_at}}.</p>
@if($user->premium && $user->premium->deactivation_job == null)
<p>Your next payment is due: {{$user->premium->next_payment}}.</p>
<br />

<p>Do you wish to unsubscribe? Your premium account will stay active until next payment date.</p>
<form action="{{route('user.premiumsignoff')}}" method="post">
@csrf
<button type="submit" class="btn btn-danger">End premium subscription</button>
</form>
@endif

@if($user->premium && $user->premium->deactivation_job != null)
<p>Your subscription will end on {{$user->premium->deactivation->deactivation_date}}</p>

<form action="{{route('user.cancelpremiumsignoff')}}" method="post">
@csrf
<button type="submit" class="btn btn-success">Resubscribe</button>
</form>

@endif
@endif

@endsection