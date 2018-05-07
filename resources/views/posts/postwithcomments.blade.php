<!DOCTYPE html>
<html>
   <head>
    <title>Show Comments for this Post</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Posts Alert</a> 
            </div>
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
        <div class="jumbotron text-centre">
            <!-- add a new comment -->
            <a class="btn" href="{{ URL::to('comments/create/' . $post->id) }}">Add a comment to this post</a>
            <!-- List all the comments -->
            @foreach($post->comments as $key =>$value)
            <p>Comment ID: {{ $value->id }}</p>
            <p>Content: {{ $value->content }}</p>
            <p>Created: {{ $value->created_at }}</p>
            <p>Last Updated: {{ $value->updated_at }}</p>
            <p>Created By: {{ $user = App\User::find($value->user_id)->name }}</p>
            <p>------</p>
            @endforeach
        </div>
       </div>
   </body>
</html>