@section('title', 'Cobranças')

<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca')">
        Cobranças

        <x-slot name="actions">
            <a href="{{ url(request()->url() . '/create') }}" class="btn btn-lg btn-primary">Adicionar</a>
        </x-slot>
    </x-breath>

    <x-breath::card title="Cobranças">

        <x-slot name="actions">
            <a href="#" data-bs-toggle="dropdown" class="btn btn-sm btn-outline-secondary"><i class="fas fa-filter fa-fw me-2"></i>Filtros</a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                <li><a href="{{ url(request()->url() . '?status=vencidas') }}" class="dropdown-item">Cobranças vencidas</a></li>
                <li><a href="{{ url(request()->url() . '?status=abertas&data=vence_em&inicio=' . today()->startOfMonth()->format('Y-m-d') . '&termino=' . today()->endOfMonth()->format('Y-m-d')) }}" class="dropdown-item">À vencer este mês</a></li>
                <li><a href="{{ url(request()->url() . '?status=pagas&data=paga_em&inicio=' . today()->startOfMonth()->format('Y-m-d') . '&termino=' . today()->endOfMonth()->format('Y-m-d')) }}" class="dropdown-item">Pagas este mês</a></li>
                <li><a href="{{ url(request()->url() . '?enviadas=0') }}" class="dropdown-item">Não enviadas as entidades</a></li>
            </ul>
            <a href="#" data-bs-toggle="modal" data-bs-target="#m-pesquisar" class="btn btn-sm btn-outline-primary"><i class="fas fa-search fa-fw me-2"></i>Pesquisar</a>
            @if (request()->query())
                <a href="{{ url(request()->url()) }}" class="btn btn-sm btn-outline-danger"><i class="far fa-times-circle fa-fw me-2"></i>Cancelar filtros</a>
            @endif
        </x-slot>

        <x-breath::table-with-pagination :resource="$cobrancas">
            <x-slot name="header">
                <tr>
                    <th>Título</th>
                    <th>Entidade</th>
                    <th class="text-end">Valor</th>
                    <th>Vence em</th>
                    <th>Pago em</th>
                    <th class="text-center"><i class="fas fa-infinity fa-fw fa-sm"></i></th>
                    <th class="text-center breath-table-action"><i class="fas fa-bars fa-fw fa-sm"></i></th>
                </tr>
            </x-slot>
            <x-slot name="body">
                @foreach($cobrancas as $cobranca)
                    <tr>
                        <td>
                            <a href="{{ url($cobranca->path()) }}" class="fw-bold">{{ $cobranca->titulo }}</a><br>
                            <small class="text-muted">{{ Str::limit($cobranca->descricao, 60) }}</small>
                        </td>
                        <td>
                            <a href="{{ url($cobranca->entidade->path()) }}" class="fw-bold">{{ $cobranca->entidade->titulo }}</a><br>
                            <small class="text-muted">{{ $cobranca->entidade->documento }}</small>
                        </td>
                        <td class="fw-bold fs-6 text-end">R$ {{ number_format($cobranca->valor, 2, ',', '.') }}</td>
                        <td>
                            {{ $cobranca->vence_em->format('d/m/Y') }}<br>
                            <small class="text-muted">{{ $cobranca->vence_em->diffForHumans() }}</small>
                        </td>
                        <td>
                            @if ( ! empty($cobranca->paga_em))
                                {{ $cobranca->paga_em->format('d/m/Y') }}<br>
                                <small class="text-muted">{{ $cobranca->paga_em->diffForHumans() }}</small>
                            @else
                                <small class="text-muted">Não efetuado</small>
                            @endif
                        </td>

                        @if ($cobranca->recorrente)
                            <td class="text-center" title="Repete a cada {{ $cobranca->repetir_a_cada }} {{ Deskfy\Models\Cobranca::REPETIR_A_CADA_CONDICOES[$cobranca->repetir_a_cada_condicao] }}"><i class="fas fa-infinity fa-fw fa-sm text-success"></i></td>
                        @else
                            <td class="text-center"><i class="fas fa-infinity fa-fw fa-sm text-light"></i></td>
                        @endif
                        
                        <x-breath::table-action>
                            {!! Form::open(['url' => $cobranca->path(), 'method' => 'delete']) !!}
                                <a href="{{ url($cobranca->path() . '/edit') }}" class="btn btn-link btn-sm"><i class="far fa-edit fa-fw"></i></a>
                                <button type="submit" class="btn btn-link btn-sm text-danger"><i class="far fa-trash-alt fa-fw"></i></button>
                            {!! Form::close() !!}
                        </x-breath>
                    </tr>
                @endforeach
            </x-slot>
        </x-breath>
    </x-breath>
    <x-breath::card title="Legendas">
        <span class="d-block my-2"><i class="fas fa-infinity fa-fw me-2 text-muted"></i>Cobrança recorrente. Uma nova cobrança é gerada quando essa cobrança for baixada.</span>
        <span class="d-block my-2"><i class="fas fa-share fa-fw me-2 text-muted"></i>Encaminhado a entidade. A cobrança foi enviada no e-mail da entidade.</span>
        <span class="d-block my-2"><i class="fas fa-paperclip fa-fw me-2 text-muted"></i>Anexos na cobrança. A cobrança possui arquivos anexados a ela (não considerando o boleto).</span>
        <span class="d-block my-2"><i class="fas fa-check-circle fa-fw me-2 text-muted"></i>Cobrança paga. A cobrança foi indicada como paga pela entidade.</span>
    </x-breath>
</x-breath>

@include('deskfy::cobranca.partials.pesquisar')