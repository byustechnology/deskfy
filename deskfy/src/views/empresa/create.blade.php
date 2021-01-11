@section('title', 'Adicionar - Minha empresa')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-empresa-create')">Adicionar empresa</x-breath>

    {!! Form::open(['url' => config('deskfy.path') . '/empresa', 'method' => 'post']) !!}
        @include('deskfy::empresa.partials.form', ['submit_text' => 'Adicionar empresa'])
    {!! Form::close() !!}
</x-breath>