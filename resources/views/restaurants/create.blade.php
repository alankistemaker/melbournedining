<!DOCTYPE html> 
<html>
   <head>
      <title>Create Restaurant</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         
                <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a>     
            </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
               <li><a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>     
            </ul>
         </nav>
         <h1>Create a Restaurant</h1>

         <!-- Removed some code here -->
         {{ Html::ul($errors->all()) }}
         {{ Form::open(array('url' => 'restaurants')) }}
         <div class="form-group">
            {{ Form::label('name', 'Restaurant Name') }}         
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">
            {{ Form::label('phone', 'Phone Number') }}         
            {{ Form::text('phone', Input::old('phone'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">         
            {{ Form::label('address1', 'Address') }}         
            {{ Form::text('address1', Input::old('address1'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">         
            {{ Form::label('address2', 'Address') }}         
            {{ Form::text('address2', Input::old('address2'), array('class' => 'formcontrol')) }}    
         </div>
         <div class="form-group">         
            {{ Form::label('suburb', 'Suburb') }}         
            {{ Form::text('suburb', Input::old('suburb'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">         
            {{ Form::label('state', 'State') }}         
            {{ Form::text('state', Input::old('state'), array('class' => 'formcontrol')) }}     
         </div>
         <div class="form-group">         
            {{ Form::label('numberofseats', 'Number of Seats') }}         
            {{ Form::text('numberofseats', Input::old('numberofseats'), array('class' => 'form-control')) }}     
         </div>
         <div class="form-group">
            {{ Form::label('category', 'Category')}}
            {{ Form::text('category_id', Input::old('category_id'), array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
            {{ Form::label('country', 'Country')}}
            {{ Form::text('country_id', Input::old('country_id'), array('class' => 'form-control')) }}

         {{ Form::submit('Create the Restaurant!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>