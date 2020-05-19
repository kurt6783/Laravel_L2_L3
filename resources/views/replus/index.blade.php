@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Replu
          <a class="btn btn-success float-xs-right" href="{{ route('replus.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($replus->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Topic_id</th> <th>User_id</th> <th>Content</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($replus as $replu)
              <tr>
                <td class="text-xs-center"><strong>{{$replu->id}}</strong></td>

                <td>{{$replu->topic_id}}</td> <td>{{$replu->user_id}}</td> <td>{{$replu->content}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('replus.show', $replu->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('replus.edit', $replu->id) }}">
                    E
                  </a>

                  <form action="{{ route('replus.destroy', $replu->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $replus->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
