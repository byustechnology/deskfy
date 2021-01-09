<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-entidade')">Entidades</x-breath>

    <x-breath::table-with-pagination :resource="$entidades">
        <x-slot name="header">
            <tr>
                <th>Título</th>
                <th>Endereço</th>
                <th class="text-center">Ações</th>
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
                        {{ $entidade->endereco }}, {{ $entidade->numero }}<br>
                        <small class="text-muted">{{ $entidade->bairro }} - {{ $entidade->cidade }}/{{ $entidade->estado }}</small>
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