@if ($errors->any())
    <div class="d-flex align-items-center text-white bg-danger border-0">
        <div class="toast-body">
            @foreach($errors->all() as $error)
                <span class="d-block"><i class="fas fa-times fa-fw me-2"></i>{{ $error }}</span>
            @endforeach
        </div>
    </div>
@endif