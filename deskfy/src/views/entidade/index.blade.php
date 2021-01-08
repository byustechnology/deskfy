<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-entidade')">Entidades</x-breath>

    @foreach($entidades as $entidade)
        <a href="{{ url($entidade->path()) }}">{{ $entidade->titulo }}</a>
    @endforeach

</x-breath>