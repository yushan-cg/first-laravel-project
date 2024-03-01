@extends('layouts.app')

@section('content')
  <h1>{{$post->title}}</h1>
  <p>{{$post->body}}</p>
  <hr>
  <small>Written on {{$post->created_at}}</small>
  @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
    <hr>
    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right']) !!}
    {{Form::hidden('_method', 'DELETE')}}
    <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
    {{Form::submit('DELETE', ['class' => 'btn btn-danger'])}}
    {!! Form::close() !!}
    @endif
  @endif
  <br><br><a href="/posts" class="btn btn-default">Go Back</a>
@endsection
