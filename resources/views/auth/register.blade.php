@extends('app')

@section('content')

<div class="jumbotron">
    <div class="container">
      <h1>Create Account</h1>
    </div>
</div>

<div class="container markdown-body">
    <div class="columns">
      <div class="column centered">
        
        @include ('errors.list')

        {!! Form::open(['url' => '/auth/register']) !!}

            <div>{!! Form::label('name', 'Name:') !!}</div>
            <p>{!! Form::text('name', old('name'), ['class' => 'input-block']) !!}</p>

            <div>{!! Form::label('email', 'Email:') !!}</div>
            <p>{!! Form::email('email', old('email'), ['class' => 'input-block']) !!}</p>

            <div>{!! Form::label('password', 'Password:') !!}</div>
            <p>{!! Form::password('password', ['class' => 'input-block']) !!}</p>

            <div>{!! Form::label('password_confirmation', 'Confirm Password:') !!}</div>
            <p>{!! Form::password('password_confirmation', ['class' => 'input-block']) !!}</p>

            {!! Form::submit('Create Account', ['class' => 'btn']) !!}

        {!! Form::close(); !!}

      </div>
    </div>
</div>

@stop
