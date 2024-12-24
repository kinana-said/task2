@extends('layouts.app')
@section("title","add post")
@section("content")
<div class="container mt-5">
  <h1 class="mb-5">add new user</h1>

  <form action="{{ route('users.store') }}" method="post">
    @csrf
  <div class="mb-3">
    <label for="name"class="form-label"><h3>name:</h3></label>

    <input type="text" name="name"   required class="form-control form-control-lg" id="name"><br/>
</div>
    <div class="mb-3">
    <label for="email"class="form-label"><h3>email:</h3></label>
    <input   name="email" class="form-control"  required id="email">
</div>
<div class="mb-3">
    <label for="password"class="form-label"><h3>password:</h3></label>
    <input   name="password" class="form-control"  required id="password">
</div>
   <input type="submit" class="btn btn-primary" name="submit" value="send">
  </form>
  </div>
@endsection
