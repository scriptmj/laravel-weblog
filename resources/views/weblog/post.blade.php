@extends('../layouts/app')

@section('content')
<div class="container">
    <h2>{{$post->title}}</h2>
    <small>By: {{$post->user->username}}. Published: {{$post->created_at->toDateString()}}</small>
    <div class="container">
        <p>{{$post->excerpt}}</p>
    </div>
    <div class="container">
        <p>{{$post->body}}</p>
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
        <div class="form-group @error('user_id') has-error @enderror">
            <label for="user_id" class="form-label">User ID</label>
            <input type="text" name="user_id" id="user_id" value="2" class="form-control" readonly>
            <input type="text" name="post_id" id="post_id" value="{{$post->id}}" class="form-control" readonly>
            
            @error('user_id')
                <p class="help-block">{{$errors->first('user_id')}}</p>
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
