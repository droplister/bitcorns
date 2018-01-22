<div class="card">
    <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}">
        <img src="{{ $farm->display_image_url }}" alt="{{ $farm->name }}" class="card-img-top" />
    </a>
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ url(route('farms.show', ['show' => $farm->address])) }}">
                {{ $farm->name }}
            </a>
        </h5>
        <p class="card-text">
            {{ env('CROPS') }}: {{ $farm->crops_owned_normalized }}<br />
            {{ env('BITCORN') }}: {{ number_format($farm->bitcorn_owned, 0) }}
        </p>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small>TX ID: {{ $farm->tx_index }}</small>
            </div>
            <div class="col">
                <small>Harvests: {{ $farm->bitcorn_harvests }}</small>
            </div>
        </div>
    </div>
</div>