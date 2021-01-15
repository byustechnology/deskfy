@section('title', $remessa->titulo . ' - Remessas')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-remessa-show', $remessa)">
        Remessa {{ $remessa->titulo }}
        <x-slot name="actions">
            <a href="#" data-bs-toggle="dropdown" class="btn btn-lg btn-primary">Ações</a>
            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                <li><a href="{{ url($remessa->path() . '/arquivo') }}" class="dropdown-item"><i class="far fa-file-code fa-fw me-1"></i> Gerar arquivo</a></li>
            </ul>
        </x-slot>
    </x-breath>

    <x-breath::card title="Informações da remessa">
        <x-breath::attribute title="Título" :value="$remessa->titulo"/>
    </x-breath>

    <x-breath::card title="Informações adicionais">
        <x-breath::attribute title="Observações" :value="$remessa->observacao"/>
    </x-breath>

    <x-breath::card title="Boletos na remessa">

        <x-slot name="actions">
            <a href="#" data-bs-toggle="modal" data-bs-target="#m-boleto" class="btn btn-primary btn-sm"><i class="far fa-file-pdf fa-fw me-2"></i>Anexar boletos</a>
        </x-slot>

        <x-breath::table :resource="$remessa->boletos" class="table-borderless table-striped table-hover">
            <x-slot name="header">
                <tr>
                    <th>Título</th>
                    <th>Valor</th>
                    <th>Vencimento</th>
                    <th class="text-center breath-table-action"><i class="fas fa-bars fa-fw fa-sm"></i></th>
                </tr>
            </x-slot>

            <x-slot name="body">
                @foreach($remessa->boletos as $boleto)
                    <tr>
                        <td>
                            <a href="{{ url($boleto->cobranca->path()) }}" class="fw-bold">{{ $boleto->cobranca->titulo }}</a>
                        </td>
                        <td><span class="fw-bold">R$ {{ number_format($boleto->cobranca->valor, 2, ',', '.') }}</span></td>
                        <td><span class="fw-bold">{{ $boleto->cobranca->vence_em->format('d/m/Y') }}</span></td>
                        <x-breath::table-action>
                            {!! Form::open(['url' => $remessa->path() . '/boleto/' . $boleto->id, 'method' => 'delete']) !!}
                                <button type="submit" class="btn btn-link btn-sm text-danger"><i class="fas fa-times fa-fw"></i></button>
                            {!! Form::close() !!}
                        </x-breath>
                    </tr>
                @endforeach
            </x-slot>
        </x-breath>
    </x-breath>
</x-breath>

@include('deskfy::remessa.partials.boleto')