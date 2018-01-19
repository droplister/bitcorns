@extends('layouts.app')

@section('title', 'Bitcorn Farms')

@section('content')
<div class="container">

    <br />
    <br />

    <h1 class="display-4">Bitcorn Farms</h1>

    <br />

    <div class="row">

    @foreach($farms as $farm)

        <div class="col-3">
            <div class="card">
                <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}"><img class="card-img-top" src="{{ $farm->image_url }}" alt="Card image cap"></a>
                <div class="card-body">
                    <h5 class="card-title">Farm #{{ $loop->iteration }}</h5>
                    <p class="card-text">{{ $farm->address }}</p>
                </div>
                <div class="card-footer">
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