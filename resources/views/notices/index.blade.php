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

            @include('partials.flash')

            <h2>Active</h2>
            @if (count($notices->where('content_removed', 0, false)))
              <table>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Author</th>
                    <th scope="col">Infringing Title</th>
                    <th scope="col">Infringing Link</th>
                    <th scope="col">Original Link</th>
                    <th scope="col">Created</th>
                    <th scope="col">Removed?</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($notices->where('content_removed', 0, false) as $notice)
                      <tr>
                        <td>{{ $notice->id }}</td>
                        <td>{{ $notice->user->name }}</td>
                        <td>{{ $notice->infringing_title }}</td>
                        <td>{!! link_to($notice->infringing_link) !!}</td>
                        <td>{!! link_to($notice->original_link) !!}</td>
                        <td title="{{ $notice->created_at->toDayDateTimeString() }}">{{ $notice->created_at->diffForHumans() }}</td>
                        <td>
                          {!! Form::open(['method' => 'PATCH', 'url' => 'notices/' . $notice->id]) !!}
                            {!! Form::checkbox('content_removed', $notice->content_removed, $notice->content_removed) !!}
                            {!! Form::submit('Submit') !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <p>There are no active notices.</p>
            @endif

            <h2>Completed</h2>
            @if (count($notices->where('content_removed', 1, false)))
              <table>
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Author</th>
                    <th scope="col">Infringing Title</th>
                    <th scope="col">Infringing Link</th>
                    <th scope="col">Original Link</th>
                    <th scope="col">Created</th>
                    <th scope="col">Removed?</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($notices->where('content_removed', 1, false) as $notice)
                      <tr>
                        <td>{{ $notice->id }}</td>
                        <td>{{ $notice->user->name }}</td>
                        <td>{{ $notice->infringing_title }}</td>
                        <td>{!! link_to($notice->infringing_link) !!}</td>
                        <td>{!! link_to($notice->original_link) !!}</td>
                        <td title="{{ $notice->created_at->toDayDateTimeString() }}">{{ $notice->created_at->diffForHumans() }}</td>
                        <td>
                          {!! Form::open(['method' => 'PATCH', 'url' => 'notices/' . $notice->id]) !!}
                            {!! Form::checkbox('content_removed', $notice->content_removed, $notice->content_removed) !!}
                            {!! Form::submit('Submit') !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            @else
              <p>There are no completed notices.</p>
            @endif

            <div class="btn-group" style="margin-top:2rem;">
                <a class="btn" href="{{ url('/notices/create') }}" role="button">Create Notice</a>
            </div>

        </div>
    </div>
</div>

@stop