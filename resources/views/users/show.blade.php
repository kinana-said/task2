@extends('layouts.app')
@section("title","show")
@section("content")


<br>
<div class="row">
    <div class="col align-self-start">
<a class="btn btn-primary m-3" href="{{route('users.index')}}">All users</a>
 </div>
 </div>
   <br>
<div class="container p-5">

    <div class="card" >
     <div class="card-header">
     <h3>Name:  {{$user->name}}</h3>
     </div>

    <div class="card-body">


    <div class="mb-3">
        <p> <h4>Email:</h4>{{$user->email}}</p>
    </div>
</div>



</div>
@endsection
