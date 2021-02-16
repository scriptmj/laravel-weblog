@extends('../layouts/app')

@section('content')
<h1>Index</h1>
@foreach($posts as $post)
    <div class="container-sm">
        <h2><a href="{{route('post.get', $post)}}">{{$post->title}}</a></h2>
        <small>By: {{$post->user->username}}. Published: {{$post->created_at->toDateString()}}</small>
        <div class="container">
            <p>{{$post->excerpt}}</p>
        </div>
        <div class="container">
            <p>{{$post->body}}</p>
        </div>
    </div>

@endforeach

@endsection
