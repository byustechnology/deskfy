@section('title', 'Entidades')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-entidade')">
        Entidades

        <x-slot name="actions">
            <a href="{{ url(request()->url() . '/create') }}" class="btn btn-lg btn-primary">Adicionar</a>
        </x-slot>
    </x-breath>

    <x-breath::card title="Entidades">

        <x-slot name="actions">
            <a href="#" data-bs-toggle="modal" data-bs-target="#m-pesquisar" class="btn btn-sm btn-outline-primary"><i class="fas fa-search fa-fw me-2"></i>Pesquisar</a>
            @if (request()->query())
                <a href="{{ url(request()->url()) }}" class="btn btn-sm btn-outline-danger"><i class="far fa-times-circle fa-fw me-2"></i>Cancelar filtros</a>
            @endif
        </x-slot>

        <x-breath::table-with-pagination :resource="$entidades">
            <x-slot name="header">
                <tr>
                    <th>Título</th>
                    <th>Endereço</th>
                    <th>Código</th>
                    <th class="text-center breath-table-action"><i class="fas fa-bars fa-fw fa-sm"></i></th>
                </tr>
            </x-slot>

            <x-slot name="body">
                @foreach($entidades as $entidade)
                    <tr>
                        <td>
                            <a href="{{ url($entidade->path()) }}"><strong>{{ $entidade->titulo}}</strong></a><br>
                            <small class="text-muted">{{ $entidade->documento }} - {{ $entidade->responsavel }}</small>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $entidade->endereco }}, {{ $entidade->numero }}</span><br>
                            <small class="text-muted">{{ $entidade->bairro }} - {{ $entidade->cidade }}/{{ $entidade->estado }}</small>
                        </td>
                        <td>
                            <span class="fw-bold">{{ $entidade->codigo }}</span><br>
                            <small class="text-muted">ID #{{ $entidade->id }}</small>
                        </td>
                        <x-breath::table-action>
                            {!! Form::open(['url' => $entidade->path(), 'method' => 'delete']) !!}
                                <a href="{{ url($entidade->path() . '/edit') }}" class="btn btn-link btn-sm"><i class="far fa-edit fa-fw"></i></a>
                                <button type="submit" class="btn btn-link btn-sm text-danger"><i class="far fa-trash-alt fa-fw"></i></button>
                            {!! Form::close() !!}
                        </x-breath>
                    </tr>
                @endforeach
            </x-slot>
        </x-breath>
    </x-breath>
</x-breath>

@include('deskfy::entidade.partials.pesquisar')