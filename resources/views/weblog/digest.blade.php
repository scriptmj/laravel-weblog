@extends('../layouts/app')

@section('content')

<h2>Weekly digest</h2>

@if(Auth::user()->digest)

<p>You are already signed up for the weekly digest.</p>
<p>Would you like to unsubscribe?</p>
<a href="{{route('user.unsubscribe')}}" class="btn btn-danger">Unsubscribe</a>

@else

<p>Sign up for our weekly digest and get the latest posts directly in your mailbox.</p>
<p>Would you like to subscribe with your email: {{Auth::user()->email}}?</p>
<a href="{{route('user.subscribe')}}" class="btn btn-success">Subscribe</a>

@endif

@endsection