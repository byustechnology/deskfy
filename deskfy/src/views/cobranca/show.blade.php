<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca-show', $cobranca)">{{ $cobranca->titulo }}</x-breath>

    <x-breath::attribute title="Título" :value="$cobranca->titulo"/>
    <x-breath::attribute-date title="Vencimento" :value="$cobranca->vence_em"/>
    <x-breath::attribute-number title="Valor" :value="$cobranca->valor" prepend="R$"/>
    
    <x-breath::table>
        <x-slot name="header">
            <tr>
                <th>Título</th>
                <th>Valor</th>
            </tr>
        </x-slot>

        <x-slot name="body">
            @foreach($cobranca->arquivos as $arquivo)
                <tr>
                    <td>{{ $cobranca->titulo }}</td>
                    <td>{{ $cobranca->valor }}</td>
                    <x-breath::table-action>
                        {!! Form::open(['url' => $arquivo->path(), 'method' => 'delete']) !!}
                            <button>Remover</button>
                        {!! Form::close() !!}
                    </x-breath>
                </tr>
            @endforeach
        </x-slot>
    </x-breath>

</x-breath>