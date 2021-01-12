@section('title', 'Adicionar - Cobranças')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-cobranca-create')">Adicionar cobrança</x-breath>

    {!! Form::open(['url' => config('deskfy.path') . '/cobranca', 'method' => 'post']) !!}
        @include('deskfy::cobranca.partials.form', ['submit_text' => 'Adicionar cobrança'])
    {!! Form::close() !!}
</x-breath>