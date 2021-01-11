<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca')">Cobranças</x-breath>

    <x-breath::table-with-pagination :resource="$cobrancas">
        <x-slot name="header">
            <tr>
                <th>Título</th>
                <th>Entidade</th>
                <th class="text-right">Valor</th>
                <th>Vence em</th>
                <th>Pago em</th>
                <th><i class="fas fa-infinity fa-fw fa-sm"></i></th>
                <th class="text-center"><i class="fas fa-bars fa-fw fa-sm"></i></th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach($cobrancas as $cobranca)
                <tr>
                    <td>
                        <a href="{{ url($cobranca->path()) }}"><strong>{{ $cobranca->titulo }}</strong></a><br>
                        <small class="text-muted">{{ Str::limit($cobranca->descricao, 60) }}</small>
                    </td>
                    <td>
                        <a href="{{ url($cobranca->entidade->path()) }}">{{ $cobranca->entidade->titulo }}</a><br>
                        <small class="text-muted">{{ $cobranca->entidade->documento }}</small>
                    </td>
                    <td>R$ {{ number_format($cobranca->valor, 2, ',', '.') }}</td>
                    <td>
                        {{ $cobranca->vence_em->format('d/m/Y') }}<br>
                        <small class="text-muted">{{ $cobranca->vence_em->diffForHumans() }}</small>
                    </td>
                    <td>
                        @if ( ! empty($cobranca->pago_em))
                            {{ $cobranca->pago_em->format('d/m/Y') }}<br>
                            <small class="text-muted">{{ $cobranca->pago_em->diffForHumans() }}</small>
                        @else
                            <small class="text-muted">Não efetuado</small>
                        @endif
                    </td>

                    @if ($cobranca->recorrente)
                        <td title="Repete por {{ $cobranca->repetir_por }} {{ Deskfy\Models\Cobranca::REPETIR_POR_CONDICOES[$cobranca->repetir_por_condicao] }} a cada {{ $cobranca->repetir_a_cada }} {{ Deskfy\Models\Cobranca::REPETIR_A_CADA_CONDICOES[$cobranca->repetir_a_cada_condicao] }}"><i class="fas fa-infinity fa-fw fa-sm text-success"></i></td>
                    @else
                        <td><i class="fas fa-infinity fa-fw fa-sm text-light"></i></td>
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