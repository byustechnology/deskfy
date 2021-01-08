<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-empresa')">Minha empresa</x-breath>

    <x-breath::table-with-pagination :resource="$empresas">
        <x-slot name="header">
            <tr>
                <th>Título</th>
                <th>Endereço</th>
                <th>Ações</th>
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
                </tr>
            @endforeach
        </x-slot>
    </x-breath>

    

</x-breath>