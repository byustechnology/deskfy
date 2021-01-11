<x-breath::modal title="Anexar arquivos" id="m-arquivo">
    {!! Form::open(['url' => $cobranca->path() . '/arquivo', 'files' => true]) !!}

        <div class="modal-body">
            <div class="mb-3">
                <x-breath::label name="Arquivos" attribute="arquivos"/>
                {!! Form::file('arquivos[]', ['class' => 'd-block', 'multiple']) !!}
                <small class="text-muted">Selecione os arquivos que você deseja anexar a esta cobrança. Os arquivos não devem ser maiores que 1MB.</small>
            </div>

            <x-breath::form-element name="Observações" attribute="observacao" type="textarea">
                <x-slot name="hint">Utilize este campo para adicionar comentários aos arquivos enviados. Estes comentários serão disponibilizados nas notificações de cobranças, e podem servir para explicar a referência de cada arquivo. Ex: Nota fiscais.</x-slot>
            </x-breath>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Anexar arquivos</button>
        </div>

    {!! Form::close() !!}

</x-breath>