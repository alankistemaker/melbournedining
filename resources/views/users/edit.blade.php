<!DOCTYPE html> 
<html>
   <head>
      <title>Edit User</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('users') }}">User Alert</a>     </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('users') }}">View All Users</a></li>
               <li><a href="{{ URL::to('users/create') }}">Create a User</a>     
            </ul>
         </nav>
         <h1>Edit {{ $user->name }}</h1>
         <!-- if there are creation errors, they will show here --> 
         {{ Html::ul($errors->all()) }} 
         {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }} 
         <div class="form-group">         
            {{ Form::label('name', 'Name') }}         
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}     
        </div>
         <div class="form-group">         
            {{ Form::label('email', 'Email') }}         
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}     
        </div>
        <div class="form-group">         
            {{ Form::label('country', 'Country') }}         
            {{ Form::select('country_id', $countries, Input::old('country'), array('class' => 'formcontrol')) }}    
         </div>
         <div class="form-group">
            {{ Form::label('role_user', 'User Roles') }}
            {{ Form::select('roles', $roles, Input::old('roles'), array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Edit User!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>