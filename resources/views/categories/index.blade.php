<!DOCTYPE html> 
<html>
   <head>
      <title>Category (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('categories') }}">Categories Alert</a>     </div>
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a>     </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('categories') }}">View All Countries</a></li>
               <li><a href="{{ URL::to('categories/create') }}">Create a Category</a>     
            </ul>
         </nav>
         <h1>All Categories</h1>
         <!-- will be used to show any messages --> 
         @if (Session::has('message'))     
         <div class="alert alert-info">{{ Session::get('message') }}</div>
         @endif 
         <table class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th>Category Name</th>
                  <th>ID</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
               </tr>
            </thead>
            <tbody>
               @foreach($categories as $key => $value)         
               <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->id }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <!-- we will also add show, edit, and delete buttons -->             
                  <td>
                     <!-- delete the category (uses the destroy method DESTROY /category/{id} -->                 
                     {{ Form::open(array('url' => 'categories/' .
                     $value->id, 'class' => 'pull-right')) }}
                     {{ Form::hidden('_method', 'DELETE') }}
                     {{ Form::submit('Delete ',
                     array('class' => 'btn btn-warning')) }}
                     {{ Form::close() }}

                     <!-- Show the restaurant (uses the show method found at GET /categories/{id} -->                 
                     <a class="btn btn-small btn-success" href="{{ URL::to('categories/' . $value->id) }}">Show </a> 

                     <!-- Edit this category (uses the edit method found at GET /categories/{id}/edit -->                 
                     <a class="btn btn-small btn-info" href="{{ URL::to('categories/' . $value->id . '/edit') }}">Edit </a> 
                  </td>
               </tr>
               @endforeach     
            </tbody>
         </table>
      </div>
   </body>