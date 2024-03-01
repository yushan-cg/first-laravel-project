@extends('layouts.app')

@section('content')
  <h1>Create Post</h1>
  {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
  <div class="form-group">
    {{Form::label('title', 'Title')}}
    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
  </div><br>
  <div class="form-group">
    {{Form::label('body', 'Body')}}
    {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
  </div><br>
    {{Form::submit('Click Me Submit!', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection