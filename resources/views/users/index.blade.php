<!DOCTYPE html> 
<html>
   <head>
      <title>Users (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a>     </div>
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a>     </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('users') }}">View All Users</a></li>
               <li><a href="{{ URL::to('users/create') }}">Create a User</a>     
            </ul>
         </nav>
         <h1>All Users</h1>
         <!-- will be used to show any messages --> 
         @if (Session::has('message'))     
         <div class="alert alert-info">{{ Session::get('message') }}</div>
         @endif 
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th>User Name</th>
                  <th>User ID</th>
                  <th>Email</th>
                  <th>Password</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
                  <th>Country</th>
                  <th>Country ID</th>
               </tr>
            </thead>
            <tbody>
               @foreach($users as $key => $value)         
               <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->password }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <td>{{ $country = App\Country::find($value->country_id)->name }}</td>
                  <td>{{ $value->country_id }}</td>
                  <!-- we will also add show, edit, and delete buttons -->             
                  <td>
                     <!-- delete the user (uses the destroy method DESTROY /users/{id} -->                 
                     {{ Form::open(array('url' => 'users/' .
                     $value->id, 'class' => 'pull-right')) }}
                     {{ Form::hidden('_method', 'DELETE') }}
                     {{ Form::submit('Delete this User',
                     array('class' => 'btn btn-warning')) }}
                     {{ Form::close() }}

                     <!-- Show the restaurant (uses the show method found at GET /restaurants/{id} -->                 
                     <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show this User</a> 

                     <!-- Edit this restaurant (uses the edit method found at GET /restaurants/{id}/edit -->                 
                     <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit this User</a> 
                  </td>
               </tr>
               @endforeach     
            </tbody>
         </table>
      </div>
   </body>