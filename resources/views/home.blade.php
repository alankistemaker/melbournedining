<!DOCTYPE html>
<html>
    <head>
        <title>Menu</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <h1>Home</h1>
            <nav class="navbar navbar-inverse">
                <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li><a href="{{ URL::to('users') }}">Users</a></li>
                    <li><a href="{{ URL::to('restaurants') }}">Restaurants</a></li>
                    <li><a href="{{ URL::to('countries') }}">Countries</a></li>
                    <li><a href="{{ URL::to('categories') }}">Categories</a></li>
                    <li><a href="{{ URL::to('posts') }}">Posts</a></li>
                    <li><a href="{{ URL::to('roles') }}">Roles</a></li>
                </ul>
            </nav>
        </div>
    </body>
</html>