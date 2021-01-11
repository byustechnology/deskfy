@section('title', 'Editar - ' . $entidade->titulo . ' - Entidades')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-entidade-edit', $entidade)">Editar entidade {{ $entidade->titulo }}</x-breath>

    {!! Form::model($entidade, ['url' => $entidade->path(), 'method' => 'put']) !!}
        @include('deskfy::entidade.partials.form', ['submit_text' => 'Editar entidade'])
    {!! Form::close() !!}

</x-breath>