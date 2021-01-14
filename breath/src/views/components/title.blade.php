<div class="d-md-flex align-items-center justify-content-between">
    <div>
        <h1 class="h1">{{ $slot }}</h1>
        <div class="breath-breadcrumbs">
            {!! $breadcrumbs ?? null !!}
        </div>
    </div>

    <div>{{ $actions ?? null }}</div>
</div>