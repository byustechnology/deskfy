<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca')">Cobranças</x-breath>

    <x-breath::table-with-pagination :resource="$cobrancas">
        <x-slot name="header">
            <tr>
                <th>Título</th>
                <th class="text-right">Valor</th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach($cobrancas as $cobranca)
                <tr>
                    <td><a href="{{ url($cobranca->path()) }}">{{ $cobranca->titulo }}</a></td>
                    <td>{{ $cobranca->valor }}</td>
                </tr>
            @endforeach
        </x-slot>

        <h1>Hello</h1>
    </x-breath>
    
</x-breath>