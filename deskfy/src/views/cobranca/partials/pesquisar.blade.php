<x-breath::modal title="Pesquisar" id="m-pesquisar">
    {!! Form::open(['url' => config('deskfy.path') . '/cobranca', 'method' => 'get']) !!}

        <div class="modal-body">
            <x-breath::input label="Título da cobrança" attribute="keyword">
                <x-slot name="hint">Informe este campo caso queira filtrar as cobranças com um título específico</x-slot>
            </x-breath>
            {!! Form::hidden('campo', 'auto') !!}
            
            <div class="row">
                <div class="col-lg-6">
                    <x-breath::select label="Status" attribute="status" :list="[
                    '' => 'Não considerar status...', 
                    'abertas' => 'Abertas',
                    'pagas' => 'Pagas', 
                    'vencidas' => 'Vencidas'
                    ]">
                        <x-slot name="hint">Informe o campo, caso deseje considerar o status das cobranças</x-slot>
                    </x-breath>
                </div>
                <div class="col-lg-6">
                    <x-breath::select label="Considerar data de" attribute="data" :list="['' => 'Não considerar', 'vence_em' => 'Vencimento', 'paga_em' => 'Pagamento']">
                        <x-slot name="hint">Selecione caso deseje filtrar as cobranças com uma data específica</x-slot>
                    </x-breath>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <x-breath::input-date label="Início" attribute="inicio">
                        <x-slot name="hint">Informe uma data de início referente ao campo de data selecionado</x-slot>
                    </x-breath>
                </div>
                <div class="col-lg-6">
                    <x-breath::input-date label="Término" attribute="termino">
                        <x-slot name="hint">Informe uma data de início término ao campo de data selecionado</x-slot>
                    </x-breath>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Pesquisar</button>
        </div>

    {!! Form::close() !!}

</x-breath>