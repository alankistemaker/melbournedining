<!DOCTYPE html> 
<html>
   <head>
      <title>Edit Role: {{ $role->name }}</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('roles') }}">Roles Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('roles') }}">View All Roles</a></li>
               <li><a href="{{ URL::to('roles/create') }}">Create a new Role</a>     
            </ul>
         </nav>
         <h1>Edit Role: {{ $role->name }}</h1>
         
         <!-- If there are any input errors they will show up here -->
         {{ Html::ul($errors->all()) }} 
         {{ Form::open(array('url' => 'roles')) }}
         <div class="form-group">
            {{ Form::label('id', 'Role ID') }}         
            {{ Form::text('id', Input::old('id'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">
            {{ Form::label('name', 'Name') }}         
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}     
         </div>

         {{ Form::submit('Edit Role', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>