<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-empresa-edit', $empresa)">Editar empresa {{ $empresa->titulo }}</x-breath>

    {!! Form::model($empresa, ['url' => $empresa->path(), 'method' => 'put']) !!}
        @include('deskfy::empresa.partials.form', ['submit_text' => 'Editar empresa'])
    {!! Form::close() !!}

</x-breath>