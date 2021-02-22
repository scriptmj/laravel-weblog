@extends('../layouts/app')

@section('content')
<div class="card w-75">
    <h2 class="card-title">{{$post->title}}</h2>
    <h6 class="card-subtitle mb-2 text-muted">Published: {{$post->created_at}}. Last updated: {{$post->lastUpdatedAt()}}</h6>
    <img class="card-img-top" src="https://picsum.photos/1200/600"></img>
    <h5 class="mb-2"><strong>By: {{$post->user->username}}.</strong></h5> 
    <div class="card-body">
        <!-- <p>{{$post->excerpt}}</p> -->
        <p>{!!$post->body!!}</p>
        <div>
        @if ($post->categories)
        @foreach($post->categories as $category)
            {{$category->name}}
        @endforeach
        @endif
        </div>
    </div>
</div>

<br />

<div class="container">
    <h3>Comments</h3>

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

    @foreach($comments as $comment)
    <div class="card">
        <p><strong>{{$comment->user->username}}</strong> said:</p>
        <p>{{$comment->body}}</p>
        <p><em>Posted on: {{$comment->posted_at}}</em></p>
    </div>
    @endforeach
</div>

@endsection
