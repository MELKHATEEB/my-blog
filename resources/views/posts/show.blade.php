@extends('layouts.app')

@section('content')
    {{-- <a href="/posts" class=" btn btn-success" role="button">Go Back</a> --}}
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
    <br><br>
    <div>
        {!!$post->body!!}
    </div> 
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <br>
    <small>Written By <h5>{{$post->user->name}}</h5></small>
    @guest
    @else
        @if(Auth::user()->id == $post->user_id)
            <hr>
            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>

            {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right']) !!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endguest
@endsection