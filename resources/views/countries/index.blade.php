<!DOCTYPE html> 
<html>
   <head>
      <title>Countries (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('countries') }}">Countries Alert</a>     </div>
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a>     </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('countries') }}">View All Countries</a></li>
               <li><a href="{{ URL::to('countries/create') }}">Create a Country</a>     
            </ul>
         </nav>
         <h1>All Countries</h1>
         <!-- will be used to show any messages --> 
         @if (Session::has('message'))     
         <div class="alert alert-info">{{ Session::get('message') }}</div>
         @endif 
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th>Country Name</th>
                  <th>ID</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
               </tr>
            </thead>
            <tbody>
               @foreach($countries as $key => $value)         
               <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <!-- we will also add show, edit, and delete buttons -->             
                  <td>
                     <!-- delete the country (uses the destroy method DESTROY /country/{id} -->                 
                     {{ Form::open(array('url' => 'countries/' .
                     $value->id, 'class' => 'pull-right')) }}
                     {{ Form::hidden('_method', 'DELETE') }}
                     {{ Form::submit('Delete this Country',
                     array('class' => 'btn btn-warning')) }}
                     {{ Form::close() }}

                     <!-- Show the restaurant (uses the show method found at GET /countries/{id} -->                 
                     <a class="btn btn-small btn-success" href="{{ URL::to('countries/' . $value->id) }}">Show this Country</a> 

                     <!-- Edit this restaurant (uses the edit method found at GET /countries/{id}/edit -->                 
                     <a class="btn btn-small btn-info" href="{{ URL::to('countries/' . $value->id . '/edit') }}">Edit this Country</a> 
                  </td>
               </tr>
               @endforeach     
            </tbody>
         </table>
      </div>
   </body>