@section('title', 'Adicionar - Remessas')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-remessa-create')">Adicionar remessa</x-breath>

    {!! Form::open(['url' => config('deskfy.path') . '/remessa', 'method' => 'post']) !!}
        @include('deskfy::remessa.partials.form', ['submit_text' => 'Adicionar remessa'])
    {!! Form::close() !!}
</x-breath>