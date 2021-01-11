<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="h6 fw-bold mb-0">{{ $title }}</h4>

            <div class="card-actions">
                {{ $actions ?? null }}
            </div>
        </div>
        <hr>

        {{ $slot }}
    </div>
</div>