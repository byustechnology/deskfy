<div class="card my-3 border-0">
    <div class="card-body shadow-sm">

        <div class="p-3">
            @if ( ! empty($title))
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="h6 fw-bold mb-0">{{ $title ?? null }}</h4>

                <div class="card-actions">
                    {{ $actions ?? null }}
                </div>
            </div>
            <hr>
            @endif

            {{ $slot }}
        </div>
    </div>
</div>