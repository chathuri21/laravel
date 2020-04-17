@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <a href="{{url('post')}}" class="btn btn-light">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:100%" src="{{asset('storage/cover_images/'.$post->cover_image)}}">
    <div>
        <p>{!!$post->body!!}</p>
    </div>
    <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
    <hr>    
    @if (!Auth::guest())
        @if (Auth::user()->id == $post->user_id)
            <a href="{{url('/post/'.$post->id.'/edit')}}" class="btn btn-primary">Edit</a>
            
            {!! Form::open(['action' => ['PostController@destroy', $post->id], 'method' => 'DELETE', 'class' => 'pull-right']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        @endif
    @endif
@endsection