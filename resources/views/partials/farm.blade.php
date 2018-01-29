<div class="card">
    <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}">
        <img src="{{ $farm->display_image_url }}" alt="{{ $farm->name }}" class="card-img-top" />
    </a>
    <div class="card-body">
        <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}" class="btn btn-outline-primary pull-right">
            <i class="fa fa-map-marker"></i> VISIT
        </a>
        <h4 class="card-title">
            <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}">
                {{ $farm->display_name }}
            </a>
        </h4>
        <p class="card-text">
            {{ env('CROPS') }}: {{ $farm->crops_owned_normalized }}<br />
            {{ env('BITCORN') }}: {{ number_format($farm->bitcorn_owned, 0) }}
        </p>
    </div>
    <div class="card-footer">
        <div class="row text-muted">
            <div class="col">
                {{ $farm->created_at->format('M d, Y') }}
            </div>
            <div class="col text-right">
                Harvests: {{ $farm->bitcorn_harvests }}
            </div>
        </div>
    </div>
</div>