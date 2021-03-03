<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Testing e-mail</p>
    @foreach($posts as $post)
    <div class="card w-50">
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
    @endforeach
</body>
</html>