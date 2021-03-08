@extends('../layouts/app')

@section('content')
<div class="card w-75">
    <h2 class="card-title">{{$post->title}}</h2>
    <h6 class="card-subtitle mb-2 text-muted">Published: {{$post->created_at}}. Last updated: {{$post->lastUpdatedAt()}}</h6>
    <img class="card-img-top" src="{{$post->image}}"></img>
    <h5 class="mb-2"><strong>By: {{$post->user->username}}.</strong></h5> 
    <div class="card-body">
        <p>{!!$post->body!!}</p>
        <hr>
        <div class="d-flex flex-row">
            @if (count($post->categories) > 0)
                @foreach($post->categories as $category)
                    <a href="/category/{{$category->id}}/posts" class="btn border p-1 m-1">{{$category->name}}</a>
                @endforeach
            @else
                <p class="text-muted">No category for this post</p>
            @endif
        </div>
    </div>
</div>

<br />

<div class="container">
    <h3>Comments</h3>

@if(Auth::check())
    <h4>Add a comment</h4>
    <form class="form-horizontal" action="{{route('post.addcomment', [$post])}}" method="post">
    @csrf
        <div class="form-group @error('body') has-error @enderror">
            <label for="body" class="form-label">Comment</label>
            <input type="text" name="body" id="body" class="form-control">
            
            @error('body')
                <p class="help-block">{{$errors->first('body')}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <br />
    <br />
@endif
    @foreach($post->comments->sortByDesc('posted_at') as $comment)
    <div class="card">
        <p><strong>{{$comment->user->username}}</strong> said:</p>
        <p>{{$comment->body}}</p>
        <p><em>Posted on: {{$comment->posted_at}}</em></p>
    </div>
    @endforeach
</div>

@endsection
