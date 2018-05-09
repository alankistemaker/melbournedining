<!DOCTYPE html> 
<html>
   <head>
      <title>Edit Comment</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('comments') }}">Comments Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('comments') }}">View All Comments</a></li>
               <li><a href="{{ URL::to('comments/create') }}">Create a Comment</a>     
            </ul>
         </nav>
         <h1>Edit Comment</h1>
         
         {{ Html::ul($errors->all()) }}
         {{ Form::open(array('url' => 'comments')) }}
         <div class="form-group">
            {{ Form::label('content', 'Content') }}         
            {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">
            {{ Form::label('id', 'ID') }}
            {{ Form::text('id', Input::old('id'), array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
            {{ Form::label('post_id', 'Post Title') }}
            {{ Form::select('post_id', $posts, Input::old('post_id'), array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
            {{ Form::label('user_id', 'User') }}
            {{ Form::select('user_id', $users, null, array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Create the Comment!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>