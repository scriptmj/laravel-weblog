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

    <div class="form-group custom-file @error('image-file') has-error @enderror">
        <input type="file" class="custom-file-input form-control" id="image-file" name="image-file">
        <label class="custom-file-label form-label" for="image-file">Choose image</label>
        @error('image-file')
            <p class="help-block">{{$errors->first('image-file')}}</p>
        @enderror
        
    </div>
<img src="{{$post->image}}" style="width:100px;height:50px;margin:5px;"></img>
    <div class="form-group @error('categories') has-error @enderror" id="categoriesDiv">
        @foreach($post->categories as $category)
            <span class="btn btn-success" id="id {{$category->id}}" onclick="resetChosenCategory({{$category->id}}, '{{$category->name}}')">{{$category->name}}</span>
        @endforeach
    </div>

    <select style="display:none" name="categories[]" id="categoriesInput" multiple>
        @foreach($post->categories as $category)
            <option value="{{$category->id}}" id="cat-option {{$category->id}}" selected></option>
        @endforeach
    </select>

    <div id="category-choices">
        @foreach($categories as $category)
            <button id="cat {{$category->id}}" type="button" class="btn btn-outline-primary" onClick="addCategory('{{$category->id}}', '{{$category->name}}')">{{$category->name}}</button>
        @endforeach
        @error('categories')
            <p class="help-block">{{$errors->first('categories')}}</p>
        @enderror
    </div>

    <div>
        <div class="form-group">
            <label for="add-category" class="form-label">New category: </label>
            <input type="text" id="add-category-input" name="add-category">
            <button type="button" class="btn btn-success glyphicon glyphicon-plus" onclick="addNewCategory()"></button>
        </div>
    </div>
    
    <br />
    <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection