<x-breath::modal title="Pesquisar" id="m-pesquisar">
    {!! Form::open(['url' => request()->url(), 'method' => 'get']) !!}

        <div class="modal-body">
            <x-breath::input label="Título da entidade" attribute="keyword">
                <x-slot name="hint">Informe as palavras-chaves para filtrar os recursos</x-slot>
            </x-breath>
            <x-breath::select label="Campo de pesquisa" attribute="campo" :list="['auto' => 'Automático', 'titulo' => 'Título da entidade', 'responsavel' => 'Responsável pela entidade', 'documento' => 'Documento da entidade', 'codigo' => 'Código']">
                <x-slot name="hint">Informe em qual campo será efetuada a pesquisa</x-slot>
            </x-breath>

            <div class="row">
                <div class="col-lg-6">
                    <x-breath::input label="Cidade" attribute="cidade">
                        <x-slot name="hint">Informe caso deseje pesquisar uma entidade pela cidade</x-slot>
                    </x-breath>  
                </div>
                <div class="col-lg-6">
                    <x-breath::select label="Estado" attribute="estado" :list="['' => 'Por favor, selecione...'] + Deskfy\Models\Estado::BRASIL">
                        <x-slot name="hint">Informe o caso deseje filtrar as entidades por estado</x-slot>
                    </x-breath>                
                </div>
            </div>
            

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Pesquisar</button>
        </div>

    {!! Form::close() !!}

</x-breath>