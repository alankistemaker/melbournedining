<!DOCTYPE html> 
<html>
   <head>
      <title>Posts (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('posts') }}">Posts Alert</a>     </div>
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a>     </div>
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
                    <th>Content</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Restaurant ID</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $key => $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->content }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                    <td>{{ $restaurant = App\Restaurant::find($value->restaurant_id)->name }}</td>
                    <td>{{ $user = App\User::find($value->user_id)->name }}</td>
                    <td>
                        <!-- Delete Button -->
                        {{ Form::open(array('url' => 'posts/' . $value->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete this Post', array('class' => 'btn btn-warning')) }}
                        {{ Form::close() }}
                        <!-- Show Button -->
                        <a class="btn btn-small btn-success" href="{{ URL::to('posts/' . $value->id) }}">Show this Restaurant</a>
                        <!-- Edit Button -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('posts/ . $value->id . /edit') }}">Edit this Post</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </body>
</html>
