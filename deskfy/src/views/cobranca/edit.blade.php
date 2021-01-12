@section('title', 'Editar - ' . $cobranca->titulo . ' - Cobranças')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca-edit', $cobranca)">Editar cobrança {{ $cobranca->titulo }}</x-breath>

    {!! Form::model($cobranca, ['url' => $cobranca->path(), 'method' => 'put']) !!}
        @include('deskfy::cobranca.partials.form', ['submit_text' => 'Editar cobrança'])
    {!! Form::close() !!}

</x-breath>