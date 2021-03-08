@extends('../../layouts/app')

@section('content')
<h1>Premium content</h1>
<p>Become a premium member for exclusive access to premium content.</p>
<p>Some examples of premium articles:</p>
@forelse($premiumposts as $post)
<h4>{{$post->title}}</h4><br />
@empty
<p>No posts yet, but check back soon!</p>
@endforelse
<br />
<h4>Sign up now!</h4>
<a href="{{route('user.premiumsignon')}}" class="btn btn-success">Sign up for premium</a>

@endsection