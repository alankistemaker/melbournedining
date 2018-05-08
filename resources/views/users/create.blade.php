<!DOCTYPE html> 
<html>
   <head>
      <title>Create User</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('users') }}">Users Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('users') }}">View All Users</a></li>
               <li><a href="{{ URL::to('users/create') }}">Create a new User</a>     
            </ul>
         </nav>
         <h1>Create a new User</h1>
         
         <!-- If there are any input errors they will show up here -->
         {{ Html::ul($errors->all()) }} 
         {{ Form::open(array('url' => 'users')) }}
         <div class="form-group">
            {{ Form::label('name', 'User Name') }}         
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">
            {{ Form::label('email', 'Email') }}         
            {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">         
            {{ Form::label('password', 'Password') }}         
            {{ Form::text('password', Input::old('password'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">         
            {{ Form::label('country', 'Country') }}         
            {{ Form::select('country_id', $countries, null, array('class' => 'formcontrol')) }}    
         </div>
         <div class="form-group">
            {{ Form::label('role_user', 'User Roles') }}
            {{ Form::select('roles', $roles, null, array('class' => 'form-control')) }}
         </div>

         {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>