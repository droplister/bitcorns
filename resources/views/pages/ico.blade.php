@extends('layouts.app')

@section('title', 'Initial Crops Offering')

@section('content')
<div class="container">

    <h1 class="display-4 mt-5 mb-2">
        Initial Crops Offering
    </h1>

    <p class="lead d-none d-sm-block">Starting February 1st, <a href="https://xchain.io/asset/CROPS" target="_blank">CROPS:XCP</a> will be available for purchase.</p>
    <p class="lead d-block d-sm-none"><a href="https://xchain.io/asset/CROPS" target="_blank">CROPS</a> will be offered for sale on Feb 1<sup>st</sup>.</p>

    <img src="{{ asset('img/bitcorn-harvest.jpg') }}" alt="Bitcorn Harvest" class="img-thumbnail img-fluid mt-3 d-none d-sm-inline" />
    <img src="{{ asset('img/bitcorn-harvest-xs.jpg') }}" alt="Bitcorn Harvest" class="img-thumbnail img-fluid mt-3 d-inline d-sm-none" />

    <h2 class="mt-5">
        Blockchain Idle Game
    </h2>

    <p class="lead">
        Bitcorns is an idle game of accumulation, similar to AdVenture Capitalist, where the only objective is to accumulate BITCORN. <br class="d-block d-sm-none" /> <br class="d-block d-sm-none" />
        BITCORN cannot be bought, rather, it gets harvested by bitcoin addresses ("farms") proportionate to their share of 100 CROPS. <br class="d-block d-sm-none" /> <br class="d-block d-sm-none" />
        Deceptively simple, accumulating BITCORN takes an amount of restraint most people do not possess.
    </p>

    <h4 class="mt-4 text-center">
        <em>Farm. Hodl. Win.</em>
    </h4>


    <h2 class="mt-5">
        Leaderboard &amp; Profile
    </h2>

    <div class="row">

        <div class="col-12 col-sm-6 mt-3 mb-4">
             <a href="{{ asset('img/leaderboard.png') }}" target="_blank">
                <img src="{{ asset('img/leaderboard.png') }}" class="img-thumbnail img-fluid" />
            </a>
        </div>

        <div class="col-12 col-sm-6 mt-3 mb-4">
             <a href="{{ asset('img/profilepage.png') }}" target="_blank">
                <img src="{{ asset('img/profilepage.png') }}" class="img-thumbnail img-fluid" />
            </a>
        </div>

    </div>

    <h2 class="mt-5">
        Available Farm Scenes
    </h2>

    <div class="row">

        @foreach(range(1,12) as $index)

            <div class="col-6 col-sm-4 mt-3 mb-4">
                <a href="{{ asset('img/farm-' . $index . '.jpg') }}" target="_blank">
                    <img src="{{ asset('img/farm-' . $index . '.jpg') }}" class="img-thumbnail img-fluid" />
                </a>
            </div>

            @if($loop->iteration % 2 === 0 && ! $loop->last)
                <div class="w-100 d-block d-sm-none"></div>
            @endif

            @if($loop->iteration % 3 === 0 && ! $loop->last)
                <div class="w-100 d-none d-sm-block"></div>
            @endif

        @endforeach
    </div>

    <h2 class="mt-5">
        Explore Alpha Release
    </h2>

    <p class="lead">
        Parts of Bitcorns.com are already live and working for the purposes of demonstration and testing. <br class="d-block d-sm-none" /> <br class="d-block d-sm-none" />
        So far, {{ \App\Farm::count() - 1 }} Bitcoin addresses have been "crop dusted" with small amounts of CROPS. Check them out!
    </p>

    <a href="{{ url(route('farms.index')) }}" class="btn btn-lg btn-primary">Browse Pre-ICO Farms &raquo;</a>

    <br />
    <br />
    <br />

</div>
@endsection