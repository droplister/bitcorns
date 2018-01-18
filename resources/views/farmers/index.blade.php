@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
<table class="table">
  <tr>
    <th>Rank</th>
    <th>Name</th>
    <th>Address</th>
    <th>{{ env('CROPS') }}</th>
    <th>{{ env('BITCORN') }}</th>
    <th>{{ env('BITCORN') }} Harvested</th>
    <th># of Harvests</th>
  </tr>
  @foreach($farmers as $farmer)
  <tr>
    <th>{{ $loop->index + 1 }}</th>
    <th>{{ $farmer->name }}</th>
    <th><a href="{{ url(route('farmers.show', ['farmer' => $farmer->address])) }}">{{ $farmer->address }}</a></th>
    <th>{{ $farmer->crops_owned_normalized }}</th>
    <th>{{ $farmer->bitcorn_owned }}</th>
    <th>{{ $farmer->bitcorn_harvested }}</th>
    <th>{{ $farmer->harvests_count }}</th>
  </tr>
  @endforeach
</table>
        </div>
    </div>
</div>
@endsection