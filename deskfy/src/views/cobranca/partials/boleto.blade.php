<x-breath::modal title="Gerar boleto" id="m-boleto">
    {!! Form::open(['url' => $cobranca->path() . '/boleto', 'files' => true]) !!}

        <div class="modal-body">

            <x-breath::input label="Número" attribute="numero">
                <x-slot name="hint">Informe o código referente ao boleto, ou <strong class="text-success">deixe em branco para que seja gerado automaticamente</strong></x-slot>
            </x-breath>

            @for ($i = 0; $i < 3; $i++)
                <x-breath::input label="Demonstrativo (linha {{ $i + 1 }})" attribute="demonstrativos[]">
                    <x-slot name="hint">Informe a <strong>linha {{ $i + 1 }} referente ao demonstrativo</strong></x-slot>
                </x-breath>
            @endfor
            <hr>
            @for ($i = 0; $i < 3; $i++)
                <x-breath::input label="Informativo (linha {{ $i + 1 }})" attribute="informativos[]">
                    <x-slot name="hint">Informe a <strong>linha {{ $i + 1 }} referente ao demonstrativo</strong></x-slot>
                </x-breath>
            @endfor
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Gerar boleto</button>
        </div>

    {!! Form::close() !!}

</x-breath>