<!DOCTYPE html> 
<html>
   <head>
      <title>Create Country</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('countries') }}">Countries Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('countries') }}">View All Countries</a></li>
               <li><a href="{{ URL::to('countries/create') }}">Create a Country</a>     
            </ul>
         </nav>
         <h1>Create a Country</h1>

         {{ Html::ul($errors->all()) }}
         {{ Form::open(array('url' => 'countries')) }}
         <div class="form-group">
            {{ Form::label('name', 'Country Name') }}         
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}     
         </div>

         {{ Form::submit('Create the Country!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>