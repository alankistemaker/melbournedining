<!DOCTYPE html>
<html>
   <head>
    <title>Show Posts for this Restaurant</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a> 
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('restaurants') }}">View all Restaurants</a>
                </li>
                <li>
                    <a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>
                </li>
                <li>
                    <a href="{{ URL::to('posts/create') }}">Add a new post for {{ $restaurant->name }}</a>
                </li>
            </ul>
        </nav>
        <h1>Showing posts about "{{ $restaurant->name }}"</h1>
        <div class="jumbotron text-centre">
            <!-- List all the posts -->
            @foreach($restaurant->posts as $key =>$value)
            <p>Post ID: {{ $value->id }}</p>
            <p>Content: {{ $value->content }}</p>
            <p>
                <a href="{{URL::to('postwithcomments/' . $value->id) }}"> Comments</a>
            </p>
            <p>Created: {{ $value->created_at }}</p>
            <p>Last Updated: {{ $value->updated_at }}</p>
            <p>Created By: {{ $user = App\User::find($value->user_id)->name }}</p>
            <p>------</p>
            @endforeach
        </div>
       </div>
   </body>
</html>