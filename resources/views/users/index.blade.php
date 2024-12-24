@extends('layouts.app')
@section("title","users")
@section("content")
<div class="col align-self-start">
    <a  href="{{route('posts.index')}}"class="btn btn-info m-3">ALL POSTS</a>
    @can('manageUser',Auth()->user())
<a  href="{{route('users.create')}}"class="btn btn-primary m-3">ADD NEW USER</a>
@endcan
<form action="{{ route("logout") }}" method="post">
    @csrf
   <input type="submit" value="logout"class="btn btn-primary m-3"></form>
<br></div>


@if($message=Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
<table class="table-responsive">

<table class="table table-striped table-hover table-borderless table-parimary aling-middle" >
    <thead class="table-light p-5">
        <tr>

          <th>Name</th>

          <th>Email</th>
          <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @forelse($users as $user)
    <tr class="table-primary">

       <td>{{$user->name}}

        </td>

       <td> <p>{{$user->email}}</p></td>
       <td>
        @can('manageUser',Auth()->user())
          <form action="{{route('users.destroy',$user->id )}}" method="post">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          <a   class="btn btn-primary" href="{{route('users.edit',$user->id)}}">Edit</a>  @endcan
          <a  class="btn btn-info" href="{{route('users.show',$user->id)}}"> Show</a>
         </td>
        </tr>
        @empty
      <h1>   THERE  IS ANY USERS</h1>
  @endforelse
</tbody>
<tfoot></tfoot>
</table>
@endsection
