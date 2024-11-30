@extends('layouts.app')
@section("title","add post")
@section("content")
<div class="container mt-5">
  <h1 class="mb-5">add new post</h1>

  <form action="{{ route('posts.store') }}" method="post"enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="title"class="form-label"><h3>title:</h3></label>

    <input type="text" name="title"   required class="form-control form-control-lg" id="title"><br/>
</div>
    <div class="mb-3">
    <label for="description"class="form-label"><h3>description:</h3></label>
   <textarea   name="description" class="form-control"  required id="description"></textarea>
</div>
<div class="mb-3">
<label for="image"class="form-label"><h3>image:</h3></label>
<input type="file" name="images[]" multiple required>
<h6> hold Ctrl to salect more than one image</h6>--
</div>
   <input type="submit" class="btn btn-primary" name="submit" value="send">
  </form>
  </div>
@endsection
