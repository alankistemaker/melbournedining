<!DOCTYPE html> 
<html>
   <head>
      <title>Edit Restaurant</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurant Alert</a>     </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
               <li><a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>     
            </ul>
         </nav>
         <h1>Edit {{ $restaurant->name }}</h1>
         <!-- if there are creation errors, they will show here --> 
         {{ Html::ul($errors->all()) }} 
         {{ Form::model($restaurant, array('route' => array('restaurants.update', $restaurant->id), 'method' => 'PUT')) }} 
         <div class="form-group">         
            {{ Form::label('name', 'Name') }}         
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
            {{ Form::selectRange('numberofseats', 1, 50) }}
         </div>
         <div class="form-group">
            {{ Form::label('category', 'Category') }}
            {{ Form::select('category_id', $categories, null, array('class' => 'form-control')) }}
         </div>
         <div class="form-group">
            {{ Form::label('country', 'Country')}}
            {{ Form::select('country_id', $countries, null, array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Edit the Restaurant!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
      </div>
   </body>
</html>