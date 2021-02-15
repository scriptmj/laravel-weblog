@extends('../layouts/app')

@section('content')
<h1>New post</h1>

<form class="form-horizontal" action="{{route('weblog.create')}}" method="post">
    @csrf

    <div class="form-group @error('title') has-error @enderror">
        <label for="title" class="form-label">Title</label>
        <input 
            type="text" 
            class="form-control"
            id="title" 
            name="title" 
            value= "{{old('title')}}"
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
            rows="3">{{old('excerpt')}}</textarea>
        
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
            rows="8">{{old('body')}}</textarea>
        
        @error('body')
            <p class="help-block">{{$errors->first('body')}}</p>
        @enderror
    </div>

    <!-- TODO REMOVE -->
    <div class="form-group @error('user_id') has-error @enderror">
        <label for="user_id" class="form-label">User ID</label>
        <input type="text" name="user_id" id="user_id" value="3" class="form-control" readonly>
        
        @error('user_id')
            <p class="help-block">{{$errors->first('user_id')}}</p>
        @enderror
    </div>
    
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
