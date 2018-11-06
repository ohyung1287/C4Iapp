@extends('layout.app')

@section('content')
    <h1>Repair Posts</h1>
@if(count($posts) > 1)
    @foreach($posts as $post)
        <div class="list-group-item">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <small>Written on {{$post->created_at}}</small>
        </div>
        @endforeach

    @else
        <p>No repair posts found</p>
    @endif
@endsection