@extends('layouts.app')

@section('content')

      <section class="jumbotron text-center" style="background: url({{ $farmer->image_url }}) no-repeat center center / cover;">
        <div class="container">
          <h1 class="jumbotron-heading">{{ $farmer->crops_owned_normalized }} {{ env('CROPS') }}</h1>
          <p class="lead text-muted">{{ $farmer->description }}</p>
          <p>
            <a href="#" class="btn btn-primary">Main call to action</a>
            <a href="#" class="btn btn-secondary">Secondary action</a>
          </p>
        </div>
      </section>

      <div class="album text-muted">
        <div class="container">

        </div>
      </div>

@endsection