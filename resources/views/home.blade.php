@extends('layouts.app')

@section('title', 'Idle Game on the Blockchain')

@section('content')
<div class="container">

    <h1 class="display-4 mt-5 mb-2">
        BITCORN CROPS
    </h1>

    <p class="lead mb-4">Bitcorns is an idle game built on the Bitcoin blockchain.</p>

    <div class="alert alert-warning" role="alert">
        This website is under construction. Feel free to poke around, but expect much to change!
    </div>

    <h2 class="display-4 pt-2 mt-5 mb-4">
        <span class="d-none d-sm-inline">Bitcorn</span> Farms
        <small class="lead">
            {{ $farms->total() }} Worldwide
        </small>
    </h2>

    <div class="row">

    @foreach($farms as $farm)

        <div class="col-12 col-sm-6 col-md-4 mt-4 mb-2">
            @include('partials.farm')
        </div>

        @if($loop->iteration % 3 === 0 && ! $loop->last)
            <div class="w-100"></div>
        @endif

    @endforeach

    </div>

    <p class="text-center mt-5 mb-5"><a href="{{ url(route('farms.index')) }}" class="btn btn-lg btn-primary">Browse Pre-ICO Farms &raquo;</a></p>

    <h2 class="display-4 pt-5 mt-5 mb-2">
        Initial Crops Offering
    </h2>

    <p class="lead d-none d-sm-block">Starting February 1st, <a href="https://xchain.io/asset/CROPS" target="_blank">CROPS:XCP</a> will be available for purchase.</p>
    <p class="lead d-block d-sm-none"><a href="https://xchain.io/asset/CROPS" target="_blank">CROPS</a> will be offered for sale on Feb 1<sup>st</sup>.</p>

    <a href="{{ url(route('pages.ico')) }}"><img src="{{ asset('img/bitcorn-harvest.jpg') }}" alt="Bitcorn Harvest" class="img-thumbnail img-fluid mt-3 d-none d-sm-inline" /></a>
    <a href="{{ url(route('pages.ico')) }}"><img src="{{ asset('img/bitcorn-harvest-xs.jpg') }}" alt="Bitcorn Harvest" class="img-thumbnail img-fluid mt-3 d-inline d-sm-none" /></a>

    <p class="text-center mt-5 mb-5"><a href="{{ url(route('pages.ico')) }}" class="btn btn-lg btn-primary">Preview ICO Details &raquo;</a></p>

    <h2 class="display-4 pt-5 mt-5 mb-2">
        Farmers' Almanac
    </h2>

    <p class="lead">Definitive guide to <span class="d-none d-sm-inline">BITCORN CROPS</span> harvests (2018-2022).</p>

    <a href="{{ url(route('pages.almanac')) }}"><img src="{{ asset('img/farmers-almanac.jpg') }}" alt="Farmers Almanac" class="img-thumbnail img-fluid mt-3 d-none d-sm-inline" /></a>
    <a href="{{ url(route('pages.almanac')) }}"><img src="{{ asset('img/farmers-almanac-xs.jpg') }}" alt="Farmers Almanac" class="img-thumbnail img-fluid mt-3 d-inline d-sm-none" /></a>

    <p class="text-center mt-5 mb-5"><a href="{{ url(route('pages.almanac')) }}" class="btn btn-lg btn-primary">BITCORN Calculator &raquo;</a></p>

    <h2 class="display-4 pt-5 mt-5 mb-2">
        Social Media
    </h2>

    <p class="lead">Please join the chat and follow on Twitter!</p>

    <p><a href="{{ env('TELEGRAM') }}" class="btn btn-lg btn-primary mr-3"><i class="fa fa-telegram"></i> Telegram</a> <a href="{{ env('TWITTER') }}" class="btn btn-lg btn-primary"><i class="fa fa-twitter"></i> Twitter.com</a> </p>

    <br />
    <br />
    <br />

</div>
@endsection
