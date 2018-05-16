<!DOCTYPE html>
<html>
   <head>
    <title>{{ $role->name }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('roles') }}">View all Roles</a>
                </li>
                <li>
                    <a href="{{ URL::to('roles/create') }}">Create a Roles</a>
                </li>
            </ul>
        </nav>
        <h1>Showing details for {{ $role->name }}</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->id }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <h2>All users with '{{ $role->name }}' role</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Role ID</th>
                    <th>Role Name</th>
                </tr>
            </thead>
            <tbody>
            @foreach($role->users as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td><a href="{{ URL::to('users/' . $value->id) }}">{{ $value->name }}</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <h4>Add user to: {{ $role->name }}</h4>
         
         {{ Html::ul($errors->all()) }}
         {{ Form::model($role, array('route' => array('addusertorole', $role->id), 'method' => 'PUT')) }}
         <div>
            {{ Form::label('user_id', 'User') }}
            {{ Form::select('user_id', $users, $users, array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Assign this user a role!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
         </div>
       </div>
   </body>
</html>