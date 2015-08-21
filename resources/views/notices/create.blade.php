@extends('app')

@section('content')

<div class="jumbotron">
    <div class="container">
      <h1>Create Notice</h1>
    </div>
</div>

<div class="container markdown-body">
    <div class="columns">
      <div class="column centered">

      {!! Form::open() !!}

          <div>{!! Form::label('provider_id', 'Provider:') !!}</div>
          <p>{!! Form::select('provider_id', ['YouTube', 'Vimeo', 'Flickr'], null, ['class' => 'input-block']) !!}</p>

          <div>{!! Form::label('infringing_title', 'Infringing Title:') !!}</div>
          <p>{!! Form::text('infringing_title', null, ['class' => 'input-block']) !!}</p>

          <div>{!! Form::label('infringing_link', 'Infringing Link:') !!}</div>
          <p>{!! Form::text('infringing_link', null, ['class' => 'input-block']) !!}</p>

          <div>{!! Form::label('original_link', 'Original Link:') !!}</div>
          <p>{!! Form::text('original_link', null, ['class' => 'input-block']) !!}</p>

          <div>{!! Form::label('original_description', 'Original Description:') !!}</div>
          <p>{!! Form::text('original_description', null, ['class' => 'input-block']) !!}</p>

          <div class="wedge-top">
          {!! Form::submit('Preview Notice', ['class' => 'btn']) !!}
          <a class="btn btn-outline" href="/notices" role="button">Cancel</a>

      {!! Form::close() !!}

      </div>
    </div>
</div>

@stop