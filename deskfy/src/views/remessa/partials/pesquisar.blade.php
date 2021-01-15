<x-breath::modal title="Pesquisar" id="m-pesquisar">
    {!! Form::open(['url' => request()->url(), 'method' => 'get']) !!}

        <div class="modal-body">
            <x-breath::input label="Título da remessa" attribute="keyword">
                <x-slot name="hint">Informe as palavras-chaves para filtrar os recursos</x-slot>
            </x-breath>
            <x-breath::select label="Campo de pesquisa" attribute="campo" :list="['' => 'Automático', 'titulo' => 'Título da remessa']">
                <x-slot name="hint">Informe em qual campo será efetuada a pesquisa</x-slot>
            </x-breath>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Pesquisar</button>
        </div>

    {!! Form::close() !!}

</x-breath>