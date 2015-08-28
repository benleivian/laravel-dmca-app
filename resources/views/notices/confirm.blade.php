@extends('app')

@section('content')

<div class="jumbotron">
    <div class="container">
      <h1>Confirm</h1>
    </div>
</div>

<div class="container markdown-body">
    <div class="columns">
      <div class="column centered">

      @include ('errors.list')

      {!! Form::open(['action' => 'NoticesController@store']) !!}

          <p>{!! Form::textarea('template', $template, ['class' => 'input-block']) !!}</p>

          <div class="wedge-top">
          {!! Form::submit('Send DMCA Notice', ['class' => 'btn']) !!}
          <a class="btn btn-outline" href="/notices" role="button">Cancel</a>

      {!! Form::close() !!}

      </div>
    </div>
</div>

@stop