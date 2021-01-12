<div class="my-3">
    @if ( ! is_null($label))
        <x-breath::label :name="$label" :attribute="$attribute"/>
    @endif
    
    {!! Form::number($attribute, $value ?? null, ['class' => 'form-control', 'step' => 'any', 'autocomplete' => 'off']) !!}

    @if (isset($hint))
        <small class="text-muted d-block mt-2">
            {{ $hint }}
        </small>
    @endif
</div>