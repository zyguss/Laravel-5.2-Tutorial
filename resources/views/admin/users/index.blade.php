 @extends('layouts.admin')


@section('content')

@if(Session::has('deleted_user'))

<p>{{session('deleted_user')}}</p>

@endif

@if(Session::has('edited_user'))

<p>{{session('edited_user')}}</p>

@endif
<h1>Users</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
        
      @if($users)  
      
        @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/placeholder.jpg' }}" ></td>
            <!--idi na stranu admin/users/edit.blade.php i ponesi id usera-->
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
            <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td> <!-- koristi carbon -->
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach
          
      @endif
      
    </tbody>
  </table>

@stop