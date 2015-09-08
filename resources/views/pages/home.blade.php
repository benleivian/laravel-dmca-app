@extends('app')

@section('content')

<div class="jumbotron">
	<div class="container">
	  <h1>Home</h1>
	</div>
</div>

<div class="container markdown-body">
	<div class="columns">
	  <div class="column centered">

	  @include('partials.flash')

	  </div>
	</div>
</div>

@stop