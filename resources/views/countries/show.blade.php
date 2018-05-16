<!DOCTYPE html>
<html>
   <head>
    <title>{{ $country->name }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('countries') }}">View all Countries</a>
                </li>
                <li>
                    <a href="{{ URL::to('countries/create') }}">Create a Country</a>
                </li>
            </ul>
        </nav>
        <h1>Showing details about "{{ $country->name }}"</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $country->name }}</td>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->created_at }}</td>
                    <td>{{ $country->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <h2>Users belonging to {{ $country->name }}</h2>
        <table class="table table-striped tabled-bordered">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>User Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($country->users as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->roles->pluck('name') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <h4>Add users to: {{ $country->name }}</h4>
         
         {{ Html::ul($errors->all()) }}
         {{ Form::model($country, array('route' => array('addusertocountry', $country->id), 'method' => 'PUT')) }}
         <div>
            {{ Form::label('user_id', 'User') }}
            {{ Form::select('user_id', $users, null, array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Add the user!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
         </div>
       </div>
   </body>
</html>