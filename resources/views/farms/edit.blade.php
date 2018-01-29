@extends('layouts.app')

@section('title', $farm->name)

@section('content')

<section class="jumbotron text-center" style="background: url({{ $farm->display_image_url }}) no-repeat center center / cover;">
    <a href="{{ url(route('farms.show', ['farm' => $farm->address])) }}" class="btn btn-sm btn-light">
        <i class="fa fa-eye"></i> View
    </a>
</section>

<div class="content">
    <div class="container">
        @if (session('error'))
            <div class="alert alert-warning mb-5" role="alert">
                {{ session('error') }}
            </div>
        @elseif (session('success'))
            <div class="alert alert-success mb-5" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="editTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true"><i class="fa fa-edit"></i> Edit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="art-tab" data-toggle="tab" href="#art" role="tab" aria-controls="art" aria-selected="true"><i class="fa fa-photo"></i> Farm Art</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="editTabContent">
                            <div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                <h3 class="mb-4">Settings:</h3>
                                <form role="form" method="POST" action="{{ url(route('farms.update', ['farm' => $farm->address])) }}">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="column" id="column1" value="name">
                                            <label class="form-check-label" for="column1">Name</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="column" id="column2" value="description">
                                            <label class="form-check-label" for="column2">Description</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="column" id="column3" value="location">
                                            <label class="form-check-label" for="column3">Location</label>
                                        </div>
                                        <small id="signatureHelp" class="form-text text-muted">What piece of information do you want to update?</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="message" class="control-label">New Value:</label>
                                        <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required>
                                        @if ($errors->has('message'))
                                            <div class="invalid-feedback">
                                                 <strong>{{ $errors->first('message') }}</strong>
                                            </div>
                                        @else
                                            <small id="messageHelp" class="form-text text-muted">The new value you want to use for selected setting.</small>
                                        @endif
                                    </div>
                                    <h3 class="mb-4">Authorize:</h3>
                                    <div class="form-group">
                                        <label for="signature" class="control-label">Signature:</label>
                                        <input id="signature" type="text" class="form-control{{ $errors->has('signature') ? ' is-invalid' : '' }}" name="signature" value="{{ old('signature') }}" required>
                                        @if ($errors->has('signature'))
                                            <div class="invalid-feedback">
                                                 <strong>{{ $errors->first('signature') }}</strong>
                                            </div>
                                        @else
                                            <small id="signatureHelp" class="form-text text-muted">Your signature proving authorization: sign(New Value).</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="art" role="tabpanel" aria-labelledby="art-tab">
                                <form role="form" method="POST" action="{{ url(route('image.update', ['farm' => $farm->address])) }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                    <h3 class="mb-4">Custom:</h3>
                                    <div class="form-group">
                                        <input type="file" name="image" accept="image/jpeg" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" />
                                        @if ($errors->has('image'))
                                            <div class="invalid-feedback">
                                                 <strong>{{ $errors->first('image') }}</strong>
                                            </div>
                                        @else
                                            <small id="imageHelp" class="form-text text-muted">Must be 1500x938 exactly. JPEG only.</small>
                                        @endif
                                    </div>
                                    <h3 class="mb-2 mt-4">Gallery:</h3>
                                    <div class="form-group row">
                                        @foreach(range(1,12) as $index)
                                            <div class="col-6 col-sm-3 mt-3 mb-4">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="image_index" id="image{{ $index }}" value="{{ $index }}">
                                                    <label class="form-check-label" for="image{{ $index }}"><img src="{{ asset('img/farm-' . $index . '.jpg') }}" class="img-thumbnail img-fluid" /></label>
                                                </div>
                                            </div>
                                            @if($loop->iteration % 2 === 0 && ! $loop->last)
                                                <div class="w-100 d-block d-sm-none"></div>
                                            @endif
                                            @if($loop->iteration % 4 === 0 && ! $loop->last)
                                                <div class="w-100 d-none d-sm-block"></div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <h3 class="mb-4">Authorize:</h3>
                                    <div class="form-group">
                                        <label for="message" class="control-label">Sign This:</label>
                                        <input id="message" type="text" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') ? old('message') : rand(1000,999999) }}" required>
                                        @if ($errors->has('message'))
                                            <div class="invalid-feedback">
                                                 <strong>{{ $errors->first('message') }}</strong>
                                            </div>
                                        @else
                                            <small id="messageHelp" class="form-text text-muted">Random number to sign with your private key.</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="signature" class="control-label">Signature:</label>
                                        <input id="signature" type="text" class="form-control{{ $errors->has('signature') ? ' is-invalid' : '' }}" name="signature" value="{{ old('signature') }}" required>
                                        @if ($errors->has('signature'))
                                            <div class="invalid-feedback">
                                                 <strong>{{ $errors->first('signature') }}</strong>
                                            </div>
                                        @else
                                            <small id="signatureHelp" class="form-text text-muted">Your signature proving authorization: sign(N).</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-save"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection