@extends('layouts.app')

@section('title', 'Bitcorn Almanac')

@section('content')
<div class="container">

<br />
<br />

<h1 class="display-4">Bitcorn Almanac</h1>
<p class="lead">Because BITCORN is a cryptographically modified organism (CMO), the yield of CROPS can be calculated and forecasted with precision.</p>

<br />

@foreach([2018, 2019, 2020, 2021, 2022] as $year)

<h2>{{ $year }} Harvest</h2>

<br />

<div class="card-deck">
  <div class="card  @if($loop->first) border-primary @endif">
    <img class="card-img-top" src="{{ asset('img/bitcorn.png') }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Winter {{ $year }}</h5>
      <p class="card-text"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">JANUARY @if($loop->first) 16 @else 1 @endif</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('img/bitcorn.png') }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Spring {{ $year }}</h5>
      <p class="card-text"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">APRRIL 1</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('img/bitcorn.png') }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Summer {{ $year }}</h5>
      <p class="card-text"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">JULY 1</small>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="{{ asset('img/bitcorn.png') }}" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Fall {{ $year }}</h5>
      <p class="card-text"></p>
    </div>
    <div class="card-footer">
      <small class="text-muted">OCTOBER 1</small>
    </div>
  </div>
</div>

<br />
<br />

@endforeach

</div>
@endsection