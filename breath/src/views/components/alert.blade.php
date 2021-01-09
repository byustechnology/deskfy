<div {{ $attributes->merge(['class' => 'mb-0 alert alert-' . $type]) }}>
    <strong>{!! ! empty($icon) ? '<i class="' . $icon . ' fa-fw me-2"></i>' : null !!}{{ $message }}</strong>
</div>