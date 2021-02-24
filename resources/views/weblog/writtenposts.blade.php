@extends('../layouts/app')

@section('content')
<h1>Written posts</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Title</th>
            <th>Posted at</th>
            <th>Last update</th>
            <th>Comments</th>
            <th>Premium</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($user->posts->sortByDesc('created_at') as $post)
        <tr>
            <td><strong>{{$post->title}}</strong></td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
            <td>{{$post->countComments()}}</td>
            <td>{{$post->premium()}}</td>
            <td>
                <a href="{{route('post.edit', $post)}}" class="btn btn-primary glyphicon glyphicon-pencil"></a>
            </td>
            <td>
                <form action="{{route('post.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure you want to delete {{$post->title}}?')"></button>
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
