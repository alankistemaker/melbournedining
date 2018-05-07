<!DOCTYPE html> 
<html>
   <head>
      <title>Create Comment for {{ $post->content }}</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('postwithcomments/' . $post->id) }}">Return to Post</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('comments') }}">View All Comments</a></li>
               <li><a href="{{ URL::to('comments/create') }}">Create a Comment</a>     
            </ul>
         </nav>
         <h1>Create a Comment for "{{ $post->content }}"</h1>
         
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
            {{ Form::label('user_id', 'User ID') }}
            {{ Form::text('user_id', Input::old('user_id'), array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Create the Comment!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>