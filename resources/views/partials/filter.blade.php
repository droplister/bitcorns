<ul class="nav nav-tabs mb-2">
    @foreach($navigation as $this_sort => $this_text)
    <li class="nav-item{{ $this_sort === 'most-harvested' ? ' d-none d-sm-block' : '' }}">
        <a class="nav-link{{ $sort === $this_sort ? ' active' : ''}}{{ 'no-crops' === $this_sort ? ' disabled' : ''}}" href="{{ url(route('farms.index', ['sort' => $this_sort])) }}">
            {{ $this_text }}
        </a>
    </li>
    @endforeach
</ul>