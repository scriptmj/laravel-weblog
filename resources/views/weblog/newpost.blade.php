@extends('../layouts/app')

@section('content')
<h1>New post</h1>

<form class="form-horizontal" action="{{route('post.create')}}" method="post" id="newPost">
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

    <!-- <div class="form-group">
        <label for="categories" class="form-label">Categories</label>
        <input 
            class="form-control" 
            name="categories" 
            id="categories" 
            type="text" 
            value="" 
            data-role="tagsinput">
    </div> -->
    <div class="form-group @error('categories') has-error @enderror">
        <label for="categories" class="form-label">Categories</label>
        <!-- <div>@foreach($categories as $category)
                <button type="button" onclick="addTag('{{$category->id}}')">{{$category->name}}</button>
            @endforeach</div> -->
        <select name="categories[]" id="categories" multiple="multiple"> 
        <!-- class="chosen-select" multiple="multiple" name="categories[]" id="categories"> -->
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('categories')
            <p class="help-block">{{$errors->first('categories')}}</p>
        @enderror
    </div>
    
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>

<script src="js/app.js"></script>
</form>
@endsection
