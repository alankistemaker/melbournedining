<!DOCTYPE html> 
<html>
   <head>
      <title>Comment (Index)</title>
      <link rel="stylesheet" href="{{asset('css/app.css')}}">
   </head>
   <body>
      <div class="container">
         <nav class="navbar navbar-inverse">
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('comments') }}">Categories Alert</a>     </div>
            <div class="navbar-header">         <a class="navbar-brand" href="{{ URL::to('home') }}">Home</a>     </div>
            <ul class="nav navbar-nav">
               <li><a href="{{ URL::to('comments') }}">View All Countries</a></li>
               <li><a href="{{ URL::to('comments/create') }}">Create a Comment</a>     
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
                  <th>Content</th>
                  <th>Created At</th>
                  <th>Last Updated</th>
               </tr>
            </thead>
            <tbody>
               @foreach($comments as $key => $value)         
               <tr>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <!-- we will also add show, edit, and delete buttons -->             
                  <td>
                     <!-- delete the comment (uses the destroy method DESTROY /comment/{id} -->                 
                     {{ Form::open(array('url' => 'comments/' .
                     $value->id, 'class' => 'pull-right')) }}
                     {{ Form::hidden('_method', 'DELETE') }}
                     {{ Form::submit('Delete ',
                     array('class' => 'btn btn-warning')) }}
                     {{ Form::close() }}

                     <!-- Show the restaurant (uses the show method found at GET /comments/{id} -->                 
                     <a class="btn btn-small btn-success" href="{{ URL::to('comments/' . $value->id) }}">Show </a> 

                     <!-- Edit this comment (uses the edit method found at GET /comments/{id}/edit -->                 
                     <a class="btn btn-small btn-info" href="{{ URL::to('comments/' . $value->id . '/edit') }}">Edit </a> 
                  </td>
               </tr>
               @endforeach     
            </tbody>
         </table>
      </div>
   </body>