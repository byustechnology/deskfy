<div class="form-check mb-3">
    <input class="form-check-input" type="checkbox" value="" id="{{ $attribute }}">
    <label class="form-check-label" for="{{ $attribute }}">
        Default checkbox
    </label>
    <x-breath::label :name="$name" :attribute="$attribute"/>

    @if (isset($hint))
        <small class="text-muted">{{ $hint }}</small>
    @endif
</div>