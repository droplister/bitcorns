@extends('layouts.app')

@section('title', $farm->name)

@section('content')

<section class="jumbotron text-center" style="background: url({{ $farm->display_image_url }}) no-repeat center center / cover;">
    <div class="container">
        <h1 class="jumbotron-heading" style="text-transform: uppercase;">{{ $farm->name }}</h1>
        <h2 class="jumbotron-heading text-muted">{{ $farm->crops_owned_normalized }} {{ env('CROPS') }}</h2>
    </div>
</section>

<br />

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border">
                <div class="card-body">
                    <h5 class="card-title">{{ $farm->name }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $farm->address }}</h6>
                    <p class="card-text">{{ $farm->description }}</p>
               </div>
            </div>
        </div>
    </div>
</div>

<br />

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="historyTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="deed-tab" data-toggle="tab" href="#deed" role="tab" aria-controls="deed" aria-selected="true">Deed</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="historyTabContent">
                            <div class="tab-pane fade show active" id="deed" role="tabpanel" aria-labelledby="deed-tab">
                                <h5 class="card-title">Farm Deed #{{ $farm->tx_index }}</h5>
                                <p class="card-text">{{ $farm->name }} was established {{ $farm->created_at->diffForHumans() }} by way of CROPS {{ $farm->type }}.</p>
                                <a href="https://xchain.io/tx/{{ $farm->tx_index }}" class="btn btn-primary" target="_blank"><i class="fa fa-search"></i> View Transaction</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="balanceTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="bitcorn-tab" data-toggle="tab" href="#bitcorn" role="tab" aria-controls="bitcorn" aria-selected="true">Bitcorn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="crops-tab" data-toggle="tab" href="#crops" role="tab" aria-controls="crops" aria-selected="true">Crops</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="balanceTabContent">
                            <div class="tab-pane fade show active" id="bitcorn" role="tabpanel" aria-labelledby="bitcorn-tab">
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                            </div>
                            <div class="tab-pane fade" id="crops" role="tabpanel" aria-labelledby="crops-tab">
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                                <br /> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection