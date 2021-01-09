<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca-show', $cobranca)">{{ $cobranca->titulo }}</x-breath>

    <a href="{{ url($cobranca->path() . '/baixar') }}">Confirmar pagamento</a>
    <a data-bs-toggle="modal" data-bs-target="#m-arquivo">Anexar arquivos</a>

    <x-breath::attribute title="Título" :value="$cobranca->titulo"/>
    <x-breath::attribute-date title="Vencimento" :value="$cobranca->vence_em"/>
    <x-breath::attribute-number title="Valor" :value="$cobranca->valor" prepend="R$"/>
    
    <div class="card card-body">
        <x-breath::table :resource="$cobranca->arquivos">
            <x-slot name="header">
                <tr>
                    <th>Título</th>
                    <th>Caminho</th>
                    <th>Adicionado em</th>
                    <th class="text-center">Ações</th>
                </tr>
            </x-slot>

            <x-slot name="body">
                @foreach($cobranca->arquivos as $arquivo)
                    <tr>
                        <td>
                            <strong><a href="{{ url($arquivo->storagePath()) }}" target="_blank">{{ $arquivo->arquivo }}</a></strong><br>
                            <small class="text-muted">{{ $arquivo->observacao }}</small>
                        </td>
                        <td>{{ $arquivo->caminho }}</td>
                        <td>{{ $arquivo->created_at->format('d/m/Y') }}, {{ $arquivo->created_at->diffForHumans() }}</td>
                        <x-breath::table-action>
                            {!! Form::open(['url' => $arquivo->path(), 'method' => 'delete']) !!}
                                <button type="submit" class="btn btn-link btn-sm text-danger"><i class="far fa-trash-alt fa-fw"></i></button>
                            {!! Form::close() !!}
                        </x-breath>
                    </tr>
                @endforeach
            </x-slot>
        </x-breath>
    </div>

</x-breath>

@include('deskfy::cobranca.partials.arquivo')