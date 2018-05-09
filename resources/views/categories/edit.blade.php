<!DOCTYPE html> 
<html>
   <head>
      <title>Edit {{ $category->name }}</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('categories') }}">Categories Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
               <li><a href="{{ URL::to('categories/create') }}">Create a Category</a>     
            </ul>
         </nav>
         <h1>Edit {{ $category->name }}</h1>
         <!-- if there are creation errors, they will show here --> 
         {{ Html::ul($errors->all()) }} 
         {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }} 
         <div class="form-group">         
            {{ Form::label('name', 'Name') }}         
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}     
        </div>
         {{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>