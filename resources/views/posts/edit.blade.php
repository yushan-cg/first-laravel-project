@extends('layouts.app')

@section('content')
  <h1>Edit Post</h1>
  <h3>{{$post->title}}</h3>
  {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
  </div><br>
  <div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body'])}}
  </div><br>
  <div class="form-group">
    {{ Form::file('cover_image') }}
  </div><br>
    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    <a href="/posts/{{$post->id}}" class="btn btn-danger">Discard</a>
    {!! Form::close() !!}
@endsection