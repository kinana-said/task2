@extends('layouts.app')
@section("title","show")
@section("content")


<br>
<div class="row">
    <div class="col align-self-start">
<a class="btn btn-primary" href="{{route('posts.index')}}">All posts</a>
 </div>
 </div>
   <br>
<div class="container p-5">

    <div class="card" >
     <div class="card-header">
     <h3>title:  {{$post->title}}</h3>
     </div>
    <div class="card-body">


     <div class="mb-3">
        @if (!empty($post->image))
        @foreach (json_decode($post->image) as $image)
            <img src="{{ asset($image) }}" alt="Post Image" width="300px">
        @endforeach
        @endif
    </div>

    <div class="mb-3">
        <p>{{$post->description}}</p>
    </div></div>



</div>
@endsection
