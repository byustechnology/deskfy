@section('title', $cobranca->titulo . ' - Cobranças')

<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca-show', $cobranca)">
        {{ $cobranca->titulo }}
        <x-slot name="actions">
            <a href="#" data-bs-toggle="dropdown" class="btn btn-lg btn-primary">Ações</a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#m-enviar" class="dropdown-item"><i class="far fa-paper-plane fa-fw me-1"></i> Enviar cobrança</a></li>
                <li><a href="#" data-bs-toggle="modal" data-bs-target="#m-baixar" class="dropdown-item"><i class="far fa-thumbs-up fa-fw me-1"></i> Confirmar pagamento</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a href="{{ url($cobranca->path() . '/edit') }}" class="dropdown-item"><i class="far fa-edit fa-fw me-1"></i> Editar cobrança</a></li>
            </ul>
        </x-slot>
    </x-breath>

    @if ($cobranca->paga_em)
        <x-breath::alert :message="'Cobrança paga em ' . $cobranca->paga_em->format('d/m/Y')" type="success" icon="fas fa-check-circle"/>
    @endif

    <x-breath::card title="Informações da cobrança">
        <div class="row">
            <div class="col-lg-8">
                <x-breath::attribute title="Título" :value="$cobranca->titulo"/>
            </div>
            <div class="col-lg">
                <x-breath::attribute title="Entidade relacionada" :value="$cobranca->entidade->titulo"/>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <x-breath::attribute-date title="Vencimento" :value="$cobranca->vence_em"/>
            </div>
            <div class="col-lg-3">
                <x-breath::attribute-number title="Valor" :value="$cobranca->valor" prepend="R$"/>
            </div>
            <div class="col-lg-3">
                <x-breath::attribute-date class="warning" title="Paga em" :value="$cobranca->paga_em"/>
            </div>
            <div class="col-lg-3">
                <x-breath::attribute title="Recorrente?" class="warning" :value="$cobranca->recorrente ? 'A cada ' . $cobranca->repetir_a_cada . ' ' . Deskfy\Models\Cobranca::REPETIR_A_CADA_CONDICOES[$cobranca->repetir_a_cada_condicao] : 'Não'"/>
            </div>
        </div>
    </x-breath>

    <x-breath::card title="Arquivos da cobrança">
        <x-slot name="actions">
            <a href="#" data-bs-toggle="modal" data-bs-target="#m-arquivo" class="btn btn-primary btn-sm"><i class="fas fa-paperclip fa-fw me-2"></i>Adicionar arquivo</a>
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
                            <i class="fas fa-paperclip fa-fw me-2 fa-sm text-muted"></i><a class="fw-bold" href="{{ url($arquivo->storagePath()) }}" target="_blank">{{ $arquivo->arquivo }}</a><br>
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

    <x-breath::card title="Boletos da cobrança">
        <x-slot name="actions">
            <a href="#" data-bs-toggle="modal" data-bs-target="#m-boleto" class="btn btn-primary btn-sm"><i class="far fa-file-pdf fa-fw me-2"></i>Gerar boleto</a>
        </x-slot>

        <x-breath::table :resource="$cobranca->boletos" class="table-borderless table-striped table-hover">
            <x-slot name="header">
                <tr>
                    <th>#</th>
                    <th>Número</th>
                    <th>Caminho</th>
                    <th>Adicionado em</th>
                    <th class="text-center breath-table-action"><i class="fas fa-bars fa-fw fa-sm"></i></th>
                </tr>
            </x-slot>

            <x-slot name="body">
                @foreach($cobranca->boletos as $boleto)
                    <tr>
                        <td>
                        <i class="far fa-file-pdf fa-fw me-2 fa-sm text-muted"></i><a class="fw-bold" href="#" target="_blank">Boleto #{{ $boleto->id }}</a><br>
                        </td>
                        <td>{{ $boleto->numero }}</td>
                        <td>{{ $boleto->caminho }}</td>
                        <td>{{ $boleto->created_at->format('d/m/Y') }}, {{ $boleto->created_at->diffForHumans() }}</td>
                        <x-breath::table-action>
                            {!! Form::open(['url' => $boleto->path(), 'method' => 'delete']) !!}
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
@include('deskfy::cobranca.partials.boleto')