<!DOCTYPE html>
<html>
   <head>
    <title>{{ $category->name }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
       <div class="container">
        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ URL::to('categories') }}">View all Categories</a>
                </li>
                <li>
                    <a href="{{ URL::to('categories/create') }}">Create a Cateogry</a>
                </li>
            </ul>
        </nav>
        <h1>Showing details about "{{ $category->name }}"</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>ID</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <h2>{{ $category->name }} Restaurants</h2>
        <table class="table table-striped tabled-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->restaurants as $key => $value)
                <tr>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->country->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <table>
            {{ Form::model($category, array('route' => array('addcategory', $category->id), 'method' => 'PUT')) }} 
            <tbody>
                <tr>
                    {{ Form::label('restaurant_id', 'Restaurant ID') }}         
                    {{ Form::select('restaurant_id', $restaurants, null, array('class' => 'form-control')) }}     
                </tr>
                <tr>
                {{ Form::submit('Add Restaurant', array('class' => 'btn btn-primary')) }} 
                {{ Form::close() }} 
                </tr>
            </tbody>
        </table>
       </div>
   </body>
</html>