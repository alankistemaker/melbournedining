<!DOCTYPE html> 
<html>
   <head>
      <title>Edit {{ $post->content }}</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('posts') }}">Posts Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('posts') }}">View All Posts</a></li>
               <li><a href="{{ URL::to('posts/create') }}">Create a new Post</a>     
            </ul>
         </nav>
         <h1>Edit {{ $post->content }}</h1>
         <!-- if there are creation errors, they will show here --> 
         {{ Html::ul($errors->all()) }} 
         {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }} 
         <div class="form-group">         
            {{ Form::label('content', 'Post Title') }}         
            {{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}     
        </div>
        <div class="form-group">         
            {{ Form::label('restaurant_id', 'Restaurant') }}         
            {{ Form::select('restaurant_id', $restaurants, Input::old('restaurant'), array('class' => 'form-control')) }}       
         </div>
         <div class="form-group">         
            {{ Form::label('userID', 'User') }}         
            {{ Form::select('user_id', $users, Input::old('user'), array('class' => 'formcontrol')) }}    
         </div>
         {{ Form::submit('Edit the post!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>