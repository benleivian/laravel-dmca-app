@extends('app')

@section('content')

<div class="jumbotron">
    <div class="container">
        <h1>Notices</h1>
    </div>
</div>

<div class="container markdown-body">
    <div class="columns">
        <div class="column centered">

            @foreach ($notices as $notice)
            <p>Notice {{ $notice->id }}: {{ $notice->infringing_title }}</p>
            @endforeach

            <div class="btn-group" style="margin-top:2rem;">
                <a class="btn" href="{{ url('/notices/create') }}" role="button">Create Notice</a>
            </div>

        </div>
    </div>
</div>

@stop