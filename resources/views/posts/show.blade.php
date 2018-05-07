<!DOCTYPE html>
<html>
   <head>
    <title>Show Comments for this Post</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('posts') }}">View all Posts</a>
                </li>
                <li>
                    <a href="{{ URL::to('posts/create') }}">Create a Post</a>
                </li>
            </ul>
        </nav>
        <h1>Showing comments about "{{ $post->content }}"</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Comment ID</th>
                    <th>Content</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Created By</th>
                </tr>
            </thead>
            <tbody>
                @foreach($post->comments as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td>{{ $user = App\User::find($value->user_id)->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
       </div>
   </body>
</html>