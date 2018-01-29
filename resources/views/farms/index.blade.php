@extends('layouts.app')

@section('title', 'Bitcorn Farms')

@section('content')
<div class="container">

    <h1 class="display-4 mt-5 mb-4">
        Bitcorn Farms
        <small class="lead">
            {{ $farms->total() }} Worldwide
        </small>
    </h1>

    @include('partials.filter')

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

</div>
@endsection