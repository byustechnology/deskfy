<div class="mb-3">
    <x-breath::label :name="$name" :attribute="$attribute"/>

    @if ($type == 'select')
        <x-breath::select :name="$name" :attribute="$attribute" :value="$value" :list="$list"/>
    @endif

    @if ($type == 'text')
        <x-breath::input :name="$name" :attribute="$attribute" :value="$value" :type="$type"/>
    @endif

    @if (isset($hint))
        <small class="text-muted">{{ $hint }}</small>
    @endif
</div>