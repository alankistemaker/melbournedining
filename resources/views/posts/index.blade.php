<!DOCTYPE html> 
<html>
   <head>
      <title>Posts (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('posts') }}">Posts Alert</a></div>
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a></div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
               <li><a href="{{ URL::to('posts/create') }}">Create a Post</a>     
            </ul>
         </nav>
         <h1>All the Posts</h1>
         <!-- will be used to show any messages --> 
         @if (Session::has('message'))     
         <div class="alert alert-info">{{ Session::get('message') }}</div>
         @endif 
         <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Post ID</th>
                    <th>Post Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Restaurant</th>
                    <th>User</th>
                    <th>Comments for this post</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>
                        <a href="{{ URL::to('posts/' . $value->id) }}">{{ $value->content }}</a>
                    </td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td><a href="{{ URL::to('restaurantwithposts/' . $value->restaurant->id) }}">{{ $value->restaurant->name }}</a></td>
                    <td><a href="{{ URL::to('users/' . $value->user->id) }}">{{ $value->user->name }}</a></td>
                    <td>{{ $value->comments->count() }}</td>
                    <td>
                        <!-- Delete Button -->
                        {{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this Post', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}
                        <!-- Show Button -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show Comments</a>
                        <!-- Edit Button -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('posts/' . $value->id . '/edit') }}">Edit this Post</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </body>
</html>
