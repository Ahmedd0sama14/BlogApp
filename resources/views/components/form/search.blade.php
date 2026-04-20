@props([
    'route' => '#',
    'placeholder' => 'Search for a Blog...',
])
<form method="GET" action="{{ $route }}" class="mb-4 w-100">
    <div class="row g-2">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control" placeholder="{{ $placeholder }}"
                value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">
                Search
            </button>
        </div>
    </div>
</form>
