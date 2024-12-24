@extends('layouts.app')
@section("title","posts")
@section("content")
<div class="col align-self-start">
<a  href="{{route('posts.create')}}"class="btn btn-primary m-3">ADD NEW POST</a>
<a  href="{{route('users.index')}}"class="btn btn-info">all USER</a>

<form action="{{ route("logout") }}" method="post">
    @csrf
   <input type="submit" value="logout"class="btn btn-primary m-3"></form>
</div>


@if($message=Session::get('success'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
<table class="table-responsive">

<table class="table table-striped table-hover table-borderless table-parimary aling-middle" >
    <thead class="table-light p-5">
        <tr>

          <th>Image</th>
          <th>Title</th>
          <th>description</th>
          <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
    @forelse($posts as $post)
    <tr class="table-primary">

       <td>@if (!empty($post->image))
        @foreach (json_decode($post->image) as $image)
            <img src="{{ asset($image) }}" alt="Post Image" width="300px">
        @endforeach

        @endif</td>
       <td>{{$post->title }}</td>
       <td> <p>{{$post->description }}</p></td>
       <td>

          <form action="{{route('posts.destroy',$post->id )}}" method="post">
            @csrf
            @method('DELETE')
            @can('manageUser',Auth()->user())
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>@endcan
          <a   class="btn btn-primary" href="{{route('posts.edit',$post->id )}}">Edit</a>
          <a  class="btn btn-info" href="{{route('posts.show',$post->id )}}">Show</a>
         </td>
        </tr>
        @empty
      <h1>   THERE  IS ANY POSTS</h1>
  @endforelse
</tbody>
<tfoot></tfoot>
</table>
@endsection
