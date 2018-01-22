@extends('layouts.app')

@section('title', 'Idle Game on the Blockchain')

@section('content')
<div class="container marketing">

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Initial Crops Offering: <span class="text-muted">February 1st, 2018</span></h2>
            <p class="lead">Become an Initial Crops Harvester and you'll be on your way to winning the first-ever idle game on the blockchain!</p>
            <a href="{{ url(route('pages.ico')) }}" class="btn btn-lg btn-outline-primary">Click Here for Details</a>
        </div>
        <div class="col-md-5">
            <a href="{{ url(route('pages.ico')) }}"><img src="{{ asset('/img/background.jpg') }}" class="featurette-image img-fluid mx-auto" alt="Initial Crops Offering"></a>
        </div>
    </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <a href="{{ url(route('pages.ico')) }}"><img src="{{ asset('/img/background.jpg') }}" class="featurette-image img-fluid mx-auto" alt="Initial Crops Offering"></a>
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
          </div>
          <div class="col-md-5">
            <a href="{{ url(route('pages.ico')) }}"><img src="{{ asset('/img/background.jpg') }}" class="featurette-image img-fluid mx-auto" alt="Initial Crops Offering"></a>
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
@endsection
