@extends('../layouts/app')

@section('content')

<h2>Posts tagged as: {{$category->name}}</h2>

    @forelse($posts as $post)
    <div class="card w-50">
        <h2 class="card-title"><a href="{{route('post.get', $post)}}">{{$post->title}}</a></h2>
        <a href="{{route('post.get', $post)}}"><img class="card-img-top" width="50%" src="{{$post->image}}"></img></a>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">By: {{$post->user->username}}. Published: {{$post->created_at}}</h6>
            <p class="card-text">{{$post->excerpt}}</p>
            <a class="card-link" href="{{route('post.get', $post)}}">Read more...</a>
            <hr>
            @if ($post->categories)
                @foreach($post->categories as $category)
                    <button onclick="filterPostsByCategory('{{$category->id}}')" class="btn border p-1 m-1">{{$category->name}}</button>
                @endforeach

            @endif
            <!--<p class="card-text">{{$post->body}}</p>-->
        </div>
        <div class="card-footer">
            <h6 class="card-subtitle mb-2 text-muted">Last updated: {{$post->lastUpdatedAt()}}</h6> 
        </div>
    </div>
        @empty
    <p>No posts found in this category</p>
    @endforelse

@endsection
