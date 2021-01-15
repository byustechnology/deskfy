@section('title', 'Editar - ' . $remessa->titulo . ' - Remessas')

<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-remessa-edit', $remessa)">Editar remessa {{ $remessa->titulo }}</x-breath>

    {!! Form::model($remessa, ['url' => $remessa->path(), 'method' => 'put']) !!}
        @include('deskfy::remessa.partials.form', ['submit_text' => 'Editar remessa'])
    {!! Form::close() !!}

</x-breath>