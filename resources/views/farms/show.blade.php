@extends('layouts.app')

@section('content')

<section class="jumbotron text-center" style="background: url({{ $farm->display_image_url }}) no-repeat center center / cover;">
    <div class="container">
        <h1 class="jumbotron-heading">{{ $farm->crops_owned_normalized }} {{ env('CROPS') }}</h1>
        <p class="lead text-muted">{{ $farm->description }}</p>
        <p>
            <a href="#" class="btn btn-primary">Main call to action</a>
            <a href="#" class="btn btn-secondary">Secondary action</a>
        </p>
    </div>
</section>

<br />

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-light">
                <div class="card-body">
                    <h5 class="card-title">Farm #1</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $farm->address }}</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</div>

<br />

<div class="content text-muted">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card text-center">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="link-tab" data-toggle="tab" href="#link" role="tab" aria-controls="link" aria-selected="true">Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="this-tab" data-toggle="tab" href="#this" role="tab" aria-controls="disabled" aria-selected="true">Thid</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tab">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade" id="this" role="tabpanel" aria-labelledby="this-tab">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection