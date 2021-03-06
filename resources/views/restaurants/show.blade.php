<!DOCTYPE html>
<html>
   <head>
    <title>{{ $restaurant->name }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('restaurants') }}">View all Restaurants</a>
                </li>
                <li>
                    <a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>
                </li>
            </ul>
        </nav>
        <h1>Showing details for {{ $restaurant->name }}</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Phone</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>Suburb</th>
                    <th>State</th>
                    <th>Number of Seats</th>
                    <th>Country</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td>{{ $restaurant->id }}</td>
                    <td>{{ $restaurant->phone }}</td>
                    <td>{{ $restaurant->address1 }}</td>
                    <td>{{ $restaurant->address2 }}</td>
                    <td>{{ $restaurant->suburb }}</td>
                    <td>{{ $restaurant->state }}</td>
                    <td>{{ $restaurant->numberofseats }}</td>
                    <td>{{ $restaurant->country->name }}</td>
                    <td>{{ $restaurant->category->name }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <h2>Posts for {{ $restaurant->name }}</h2>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Post ID</th>
                    <th>Post Desc</th>
                    <th>Comments for this post</th>
                </tr>
            </thead>
            <tbody>
            @foreach($restaurant->posts as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td><a href="{{ URL::to('posts/' . $value->id) }}">{{ $value->content }}</a></td>
                <td>{{ $value->comments->count() }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <h4>Create Post for: {{ $restaurant->name }}</h4>
         
         {{ Html::ul($errors->all()) }}
         
         <!-- Open a form to create a new post -->
         {{ Form::open(array('url' => 'posts')) }}
         <div class="form-group">
            {{ Form::label('post_content', 'Title') }}
            {{ Form::text('content', null, array('class' => 'form-control')) }}
         </div>
         <div>
            {{ Form::hidden('restaurant_id', $restaurant->id, array('id' => 'restaurant_id')) }}
         </div>
         <div>
            {{ Form::label('user_id', 'User') }}
            {{ Form::select('user_id', $users, $users, array('class' => 'form-control')) }}
         </div>
         {{ Form::submit('Create the Post!', array('class' => 'btn btn-primary')) }} 
         {{ Form::close() }} 
         </div>
       </div>
   </body>
</html>