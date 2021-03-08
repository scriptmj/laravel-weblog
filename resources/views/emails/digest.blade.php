<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .body{
        font-family:"Helvetica Neue",Arial,"Noto Sans","Liberation Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    }
    .card {
        position:relative;
        display:flex;
        width:50%!important;
        flex-direction:column;
        background-clip:border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius:.25red;
    } 
    .card-title {
        margin-bottom:.75rem;
        margin-top:0;
        font-size:2rem;
        font-weight:500;
        line-height:1.2;
    }
    .card-body{
        flex:1 1 auto;
        min-height:1px;
        padding:1.25rem;
    }
    .card-footer{
        padding:.75rem 1.25rem;
        background-color:rgba(0,0,0,.03);
        border-top:1px solid rgba(0,0,0,.125);
    }
    .card-subtitle{
        margin-top:.25rem;
        margin-bottom:.25rem;
        color:#6c757d!important;
    }
    .btn{
        font-size:14px;
        border: 1px solid #dee2e6;
        display:inline-block;
        font-weight:400;
        color:#212529;
        text-align:center;
        vertical-align:middle;
        line-height:1.5;
        border-radius: 1rem;
    }
    </style>
    <title>Document</title>
</head>
<body>
<h3>New posts since last week:</h3>
    @foreach($posts as $post)
    <div class="card w-50">
        <h2 class="card-title"><a href="{{route('post.get', $post)}}">{{$post->title}}</a></h2>
        <a href="{{route('post.get', $post)}}"><img class="card-img-top" width="50%" src="{{$post->image}}"></img></a>
        <div class="card-body">
            <h6 class="card-subtitle">By: {{$post->user->username}}. Published: {{$post->created_at}}</h6>
            <p class="card-text">{{$post->excerpt}}</p>
            <a class="card-link" href="{{route('post.get', $post)}}">Read more...</a>
            <hr>
            @if (count($post->categories) > 0)
                @foreach($post->categories as $category)
                
                    <span class="btn">{{$category->name}}</span>
                @endforeach
            @else
                <p class="card-subtitle">No category for this post</p>
            @endif
        </div>
        <div class="card-footer">
            <h6 class="card-subtitle">Last updated: {{$post->lastUpdatedAt()}}</h6> 
        </div>
    </div>
    <br />
    @endforeach
</body>
</html>