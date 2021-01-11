<div class="mb-3">
    <x-breath::label :name="$name" :attribute="$attribute"/>

    <div class="input-group">

        {{ $prepend ?? null }}

        @if ($type == 'select')
            <x-breath::select :attribute="$attribute" :value="$value" :list="$list"/>
        @endif

        @if ($type == 'textarea')
            <x-breath::textarea :attribute="$attribute" :value="$value"/>
        @endif

        @if ($type == 'number')
            <x-breath::input-number :attribute="$attribute" :value="$value"/>
        @endif

        @if ($type == 'date')
            <x-breath::input-date :attribute="$attribute" :value="$value"/>
        @endif

        @if ($type == 'text')
            <x-breath::input :attribute="$attribute" :value="$value" :type="$type"/>
        @endif

        {{ $append ?? null }}
    </div>

    @if (isset($hint))
        <small class="text-muted">{{ $hint }}</small>
    @endif
</div>