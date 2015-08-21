@extends('app')

@section('content')

<div class="jumbotron">
    <div class="container">
      <h1>Login</h1>
    </div>
</div>

<div class="container markdown-body">
    <div class="columns">
      <div class="column centered">

        @include ('errors.list')

        {!! Form::open(['url' => '/auth/login']) !!}

            <div>{!! Form::label('email', 'Email:') !!}</div>
            <p>{!! Form::email('email', old('email'), ['class' => 'input-block']) !!}</p>

            <div>{!! Form::label('password', 'Password:') !!}</div>
            <p>{!! Form::password('password', ['class' => 'input-block']) !!}</p>

            <div class="form-checkbox">
              <label>
                {!! Form::checkbox('remember', 'remember') !!}
                <span style="position:relative;top:-5px;">Remember Me</span>
              </label>
            </div>

            {!! Form::submit('Login', ['class' => 'btn']) !!}
            <a class="btn btn-outline" href="/auth/register" role="button">Create Account</a>

        {!! Form::close(); !!}

      </div>
    </div>
</div>

@stop
