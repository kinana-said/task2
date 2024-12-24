@extends('layouts.app')
@section("title","edit")
@section("content")

<div class="container mt-5">
  <h1 class="mb-5">Update  post</h1>

    <div class="col align-self-start">
<a class="btn btn-primary" href="{{route('users.index')}}">All Users</a>
 </div>
  <form action="{{ route('users.update',$user->id) }}" method="post">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="name"class="form-label"><h3>name:</h3></label>

    <input type="text" name="name"   class="form-control form-control-lg" id="title" value="{{$user->name}}"><br/>
</div>
    <div class="mb-3">
    <label for="password"class="form-label"><h3>password:</h3></label>
    <input   name="password"  sometimes class="form-control" id="password" ><br/>
</div>
<div class="mb-3">
    <label for="email"class="form-label"><h3>email:</h3></label>

    <input type="text" name="email"   class="form-control form-control-lg" id="title" value="{{$user->email}}"><br/>
</div>

   <input type="submit" class="btn btn-primary" name="submit" value="send">
  </form>
  </div>
@endsection
