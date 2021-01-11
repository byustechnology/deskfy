@section('title', $cobranca->titulo . ' - Cobranças')

<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca-show', $cobranca)">{{ $cobranca->titulo }}</x-breath>

    
    <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#m-enviar"><i class="far fa-paper-plane fa-fw me-1"></i> Enviar cobrança</a>
    <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#m-baixar"><i class="far fa-thumbs-up fa-fw me-1"></i> Confirmar pagamento</a>
    <hr>

    <x-breath::attribute title="Título" :value="$cobranca->titulo"/>
    <x-breath::attribute-date title="Vencimento" :value="$cobranca->vence_em"/>
    <x-breath::attribute-number title="Valor" :value="$cobranca->valor" prepend="R$"/>
    <x-breath::attribute-date title="Paga em" :value="$cobranca->paga_em"/>

    <x-breath::card title="Arquivos da cobrança">
        <x-slot name="actions">
            <a href="#" data-bs-toggle="modal" data-bs-target="#m-arquivo" class="btn btn-primary btn-sm">Adicionar arquivo</a>
        </x-slot>

        <x-breath::table :resource="$cobranca->arquivos" class="table-borderless table-striped table-hover">
            <x-slot name="header">
                <tr>
                    <th>Título</th>
                    <th>Caminho</th>
                    <th>Adicionado em</th>
                    <th class="text-center breath-table-action"><i class="fas fa-bars fa-fw fa-sm"></i></th>
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
    </x-breath>

</x-breath>

@include('deskfy::cobranca.partials.arquivo')
@include('deskfy::cobranca.partials.enviar')
@include('deskfy::cobranca.partials.baixar')