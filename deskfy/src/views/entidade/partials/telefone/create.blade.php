<x-breath::modal title="Adicionar telefone" id="m-telefone">
    {!! Form::open(['url' => $entidade->path() . '/telefone']) !!}

        <div class="modal-body">
            <div class="mb-3">
                <x-breath::input label="Digite o telefone" attribute="valor">
                    <x-slot name="hint">Informe o e-mail que será cadastrado. <strong class="text-success">Preencha também o código da área (DDD) para o telefone</strong></x-slot>
                </x-breath>
            </div>

            <x-breath::textarea label="Observações" attribute="observacao">
                <x-slot name="hint">Utilize este campo para adicionar observações referentes ao telefone.</x-slot>
            </x-breath>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Adicionar telefone</button>
        </div>

    {!! Form::close() !!}

</x-breath>