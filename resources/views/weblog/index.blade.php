@extends('../layouts/app')

@section('contentheader')
<br />
<div id="category-choices">
    <p>Filter by category</p>
    @foreach($categories as $category)
        <button id="cat {{$category->id}}" type="button" class="category btn btn-light" onClick="filterPostsByCategory('{{$category->id}}')">{{$category->name}}</button>
    @endforeach
    <hr />
</div>
@endsection
@section('content')
<div id="contentDiv">
@forelse($posts as $post)

    <div class="card w-50">
        <span></span>
        <h2 class="card-title"><a href="{{route('post.get', $post)}}">{{$post->title}}</a></h2>
        <a href="{{route('post.get', $post)}}"><img class="card-img-top" width="50%" src="{{$post->image}}"></img></a>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">By: {{$post->user->username}}. Published: {{$post->created_at}}</h6>
            <p class="card-text">{{$post->excerpt}}</p>
            <a class="card-link" href="{{route('post.get', $post)}}">Read more...</a>
            <hr>
            @if (count($post->categories) > 0)
                @foreach($post->categories as $category)
                    <button onclick="filterPostsByCategory('{{$category->id}}')" class="btn border p-1 m-1">{{$category->name}}</button>
                @endforeach
            @else
                <p class="text-muted">No category for this post</p>
            @endif
        </div>
        <div class="card-footer">
            <h6 class="card-subtitle mb-2 text-muted">Last updated: {{$post->lastUpdatedAt()}}</h6> 
        </div>
    </div>
@empty
<p>No posts found</p>
@endforelse
@if($posts->links())
{{$posts->links()}}
@endif
</div>


@endsection
