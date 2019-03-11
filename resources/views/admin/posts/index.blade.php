@extends('layouts.admin')

@section('content')

@if(Session::has('deleted_post'))

<p>{{session('deleted_user')}}</p>

@endif

@if(Session::has('updated_post'))

<p>{{session('updated_post')}}</p>

@endif
<h1>Posts</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        
      @if($posts)  
      
        @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : '/images/placeholder.jpg' }}"></td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized' }}</td>
            <td>{{$post->title}}</td>
            <td>{{str_limit($post->body, 19)}}</td> <!--ogranicava text u tabeli body na 19 -->
            <td>{{$post->created_at->diffForHumans()}}</td> <!-- koristi carbon -->
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach
          
      @endif 
      
    </tbody>
  </table>

@stop()
