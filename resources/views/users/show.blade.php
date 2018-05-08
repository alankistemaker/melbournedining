<!DOCTYPE html>
<html>
   <head>
    <title>{{ $user->name }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('users') }}">View all Users</a>
                </li>
                <li>
                    <a href="{{ URL::to('users/create') }}">Create a User</a>
                </li>
            </ul>
        </nav>
        <h1>Showing details for {{ $user->name }}</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Country</th>
                    <th>Roles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->country->name }}</td>
                    <td>{{ $user->roles->pluck('name') }}</td>
                </tr>
            </tbody>
        </table>
        <h2>Comments by {{ $user->name }}</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Post ID</th>
                    <th>Post Desc</th>
                    <th>Comments for this post</th>
                </tr>
            </thead>
            <tbody>
            @foreach($user->posts as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->content }}</td>
                <td>{{ $value->comments->pluck('name') }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
       </div>
   </body>
</html>