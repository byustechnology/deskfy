@if (session()->has('flash_success'))
    <div class="d-flex align-items-center text-white bg-success border-0">
        <div class="toast-body">
            <span class="d-block"><i class="fas fa-check-circle fa-fw me-2"></i>{!! session()->get('flash_success') !!}</span>
        </div>
    </div>
@endif

@if (session()->has('flash_warning'))
    <div class="d-flex align-items-center text-white bg-warning border-0">
        <div class="toast-body">
            <span class="d-block"><i class="fas fa-exclamation-circle fa-fw me-2"></i>{!! session()->get('flash_warning') !!}</span>
        </div>
    </div>
@endif

@if (session()->has('flash_danger'))
    <div class="d-flex align-items-center text-white bg-danger border-0">
        <div class="toast-body">
            <span class="d-block"><i class="fas fa-exclamation-triangle fa-fw me-2"></i>{!! session()->get('flash_danger') !!}</span>
        </div>
    </div>
@endif