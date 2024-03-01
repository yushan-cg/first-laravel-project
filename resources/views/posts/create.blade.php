@extends('layouts.app')

@section('content')
  <h1>Create Post</h1>
  {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
  </div><br>
  <div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
  </div><br>
  <div class="form-group">
    {{ Form::file('cover_image') }}
  </div><br>

    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    <a href="/posts" class="btn btn-danger">Discard</a>
    {!! Form::close() !!}
@endsection