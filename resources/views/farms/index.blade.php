@extends('layouts.app')

@section('title', 'Bitcorn Farms')

@section('content')
<div class="container">

    <br />
    <br />

    <h1 class="display-4">Bitcorn Farms <small class="lead">{{ $farms->total() }} Worldwide</small></h1>
    <br />

    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link {{ $list === null ? 'active' : ''}}" href="{{ url(route('farms.index')) }}">Biggest Farms</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $list === 'most-harvested' ? 'active' : '' }}" href="{{ url(route('farms.index', ['list' => 'most-harvested'])) }}">Most Harvested</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ $list === 'oldest-farms' ? 'active' : '' }}" href="{{ url(route('farms.index', ['list' => 'oldest-farms'])) }}">OG Bitcorners</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled {{ $list === 'no-croppers' ? 'active' : '' }}" href="{{ url(route('farms.index', ['list' => 'no-croppers'])) }}">No Croppers</a>
      </li>
    </ul>

    <br />

    <div class="row">

    @foreach($farms as $farm)

        <div class="col-3">
            <br />
            <div class="card">
                <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}"><img class="card-img-top" src="{{ $farm->display_image_url }}" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $farm->name ? $farm->name : 'Farm #' . $farm->tx_index }}</h5>
                    <p class="card-text">
                        {{ env('CROPS') }}: {{ $farm->crops_owned_normalized }}<br />
                        {{ env('BITCORN') }}: {{ $farm->bitcorn_harvested }}
                    </p>
                </div>
                <div class="card-footer">
                    <small>Farm #{{ $loop->index }} - {{ $farm->type }}</small>
                </div>
            </div>
            <br />
        </div>

        @if($loop->iteration % 4 === 0 && ! $loop->last)
            <div class="w-100"></div>
        @endif

    @endforeach

    </div>

</div>
@endsection