<div class="my-2">
    @if ( ! is_null($label))
        <x-breath::label :name="$label" :attribute="$attribute"/>
    @endif
    
    {!! Form::textarea($attribute, $value ?? null, ['class' => $errors->has($attribute) ? 'form-control border border-danger' : 'form-control', 'rows' => 3]) !!}

    @if ($errors->has($attribute))
        <strong class="text-danger d-block mt-2">
            <i class="fas fa-times-circle fa-fw me-1"></i>{{ $errors->get($attribute)[0] }}
        </strong>
    @endif

    @if (isset($hint))
        <small class="text-muted d-block mt-2">
            {{ $hint }}
        </small>
    @endif
</div>