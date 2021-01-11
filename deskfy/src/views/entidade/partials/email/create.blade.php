<x-breath::modal title="Adicionar e-mail" id="m-email">
    {!! Form::open(['url' => $entidade->path() . '/email']) !!}

        <div class="modal-body">
            <div class="mb-3">
                <x-breath::form-element name="Digite o e-mail" attribute="valor">
                    <x-slot name="hint">Informe o e-mail que será cadastrado. <strong class="text-success">O e-mail deve ser válido</strong></x-slot>
                </x-breath>
            </div>

            <x-breath::form-element name="Observações" attribute="observacao" type="textarea">
                <x-slot name="hint">Utilize este campo para adicionar observações referentes ao e-mail.</x-slot>
            </x-breath>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Adicionar e-mail</button>
        </div>

    {!! Form::close() !!}

</x-breath>