@extends('app')

@section('content')

<div class="jumbotron">
	<div class="container">
	  <h1>Dashboard</h1>
	</div>
</div>

<div class="container markdown-body">
	<div class="columns">
	  <div class="column centered">
	  	<p class="lead">{{ $user->name }}</p>
	  	<p>{{ $user->email }}</p>
	  </div>
	</div>
</div>

@stop