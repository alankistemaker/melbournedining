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
                    <td>{{ $value->user->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <h4>Create Comment for: {{ $post->content }}</h4>
         
         {{ Html::ul($errors->all()) }}
         
         <!-- Open a form to create a new comment -->
         {{ Form::open(array('url' => 'comments')) }}
         <div class="form-group">
            {{ Form::label('content', 'Comment:') }}
            {{ Form::text('content', null, array('class' => 'form-control')) }}
         </div>
         <div>
            {{ Form::hidden('post_id', $post->id, array('id' => 'post_id')) }}
         </div>
         <div>
            {{ Form::label('user_id', 'User') }}
            {{ Form::select('user_id', $users, $users, array('class' => 'form-control')) }}
         </div>
         <div>
            {{ Form::label('id', 'Comment ID') }}
            {{ Form::text('id', null, array('class' => 'form-control')) }}
        </div>
         {{ Form::submit('Create the Comment!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
         </div>
       </div>
   </body>
</html>