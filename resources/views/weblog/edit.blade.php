@extends('../layouts/app')

@section('content')
<h1>Edit</h1>
<form class="form-horizontal" action="{{route('post.update', $post)}}" method="post">
    @csrf
    @method('put')

    <div class="form-group @error('title') has-error @enderror">
        <label for="title" class="form-label">Title</label>
        <input 
            type="text" 
            class="form-control"
            id="title" 
            name="title" 
            value= "{{old('title', $post->title)}}"
            >
            
        @error('title')
            <p class="help-block">{{$errors->first('title')}}</p>
        @enderror
    </div>
    
    <div class="form-group @error('excerpt') has-error @enderror">
        <label for="excerpt" class="form-label">Excerpt</label>
        <textarea 
            class="form-control" 
            id="excerpt" 
            name="excerpt" 
            rows="3">{{old('excerpt', $post->excerpt)}}</textarea>
        
        @error('excerpt')
            <p class="help-block">{{$errors->first('excerpt')}}</p>
        @enderror
    </div>
    
    <div class="form-group @error('body') has-error @enderror">
        <label for="body" class="form-label">Body</label>
        <textarea 
            class="form-control" 
            id="body" 
            name="body" 
            rows="8">{{old('body', $post->body)}}</textarea>
        
        @error('body')
            <p class="help-block">{{$errors->first('body')}}</p>
        @enderror
    </div>
    <div>
        <p>{{$errors}}</p>
    </div>
    
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection