<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-empresa')">Minha empresa</x-breath>

    <x-breath::table-with-pagination :resource="$empresas">
        <x-slot name="header">
            <tr>
                <th>Título</th>
                <th>Endereço</th>
                <th class="text-center"><i class="fas fa-bars fa-fw fa-sm"></i></th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach($empresas as $empresa)
                <tr>
                    <td>
                        <a href="{{ url($empresa->path()) }}">{{ $empresa->titulo }}</a><br>
                        <small class="text-muted">{{ $empresa->documento }}</small>
                    </td>
                    <td>
                        {{ $empresa->endereco }}, {{ $empresa->numero }}<br>
                        <small class="text-muted">{{ $empresa->bairro }} - {{ $empresa->cidade }}/{{ $empresa->estado }}</small>
                    </td>
                    <x-breath::table-action>
                        {!! Form::open(['url' => $empresa->path(), 'method' => 'delete']) !!}
                            <a href="{{ url($empresa->path() . '/edit') }}" class="btn btn-link btn-sm"><i class="far fa-edit fa-fw"></i></a>
                            <button type="submit" class="btn btn-link btn-sm text-danger"><i class="far fa-trash-alt fa-fw"></i></button>
                        {!! Form::close() !!}
                    </x-breath>
                </tr>
            @endforeach
        </x-slot>
    </x-breath>

    

</x-breath>