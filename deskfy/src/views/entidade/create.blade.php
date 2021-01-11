<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-entidade-create')">Adicionar entidade</x-breath>

    {!! Form::open(['url' => config('deskfy.path') . '/entidade', 'method' => 'post']) !!}
        @include('deskfy::entidade.partials.form', ['submit_text' => 'Adicionar entidade'])
    {!! Form::close() !!}
</x-breath>