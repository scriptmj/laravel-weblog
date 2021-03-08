@extends('../layouts/app')

@section('content')
<h1>New post</h1>

<form class="form-horizontal" action="{{route('post.create')}}" method="post" id="newPost" enctype="multipart/form-data">
    @csrf

<!-- Title -->
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
    
<!-- Excerpt -->
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
    
<!-- Body -->
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

<!-- Premium -->
    <div class="form-group">
        <label for="premium" class="form-check-label">Premium article?</label>
        <input type="checkbox" class="form-check" id="premium" name="premium"></input>
    </div>
    {{$errors}}

<!-- Upload image -->
    <div class="form-group custom-file @error('image-file') has-error @enderror">
        <input type="file" class="custom-file-input form-control" id="image-file" name="image-file">
        <label class="custom-file-label form-label" for="image-file">Choose image</label>
        @error('image-file')
            <p class="help-block">{{$errors->first('image-file')}}</p>
        @enderror
    </div>
    <!-- Image preview -->
    <img id="preview-image-before-upload" style="width:200px;height:100px;margin:5px;"></img>

<!-- Categories selection -->
    <div class="form-group @error('categories') has-error @enderror" id="categoriesDiv"></div>

<!-- Categories selection for form HIDDEN -->    
    <select style="display:none" name="categories[]" id="categoriesInput" multiple></select>

<!-- Category choices -->
    <div id="category-choices">
        @foreach($categories as $category)
            <button id="cat {{$category->id}}" type="button" class="btn btn-outline-primary" onClick="addCategory('{{$category->id}}', '{{$category->name}}')">{{$category->name}}</button>
        @endforeach
        @error('categories')
            <p class="help-block">{{$errors->first('categories')}}</p>
        @enderror
    </div>

<!-- Adding new custom category -->
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

<script src="../../js/image-upload.js"></script>
@endsection
