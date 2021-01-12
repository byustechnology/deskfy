<div class="my-3">
    @if ( ! is_null($label))
        <x-breath::label :name="$label" :attribute="$attribute"/>
    @endif
    
    {!! Form::select($attribute, $list ?? ['' => 'Sem opções'], $value ?? null, ['class' => 'form-control', 'autocomplete' => 'off']) !!}

    @if (isset($hint))
        <small class="text-muted d-block mt-2">
            {{ $hint }}
        </small>
    @endif
</div>