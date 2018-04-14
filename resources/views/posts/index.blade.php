@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card card-body">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on {{$post->created_at}}</small>
                <small>Written By <h5>{{$post->user->name}}</h5></small>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
    <p>No Posts Found!</p>

    @endif
@endsection