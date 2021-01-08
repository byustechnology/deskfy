<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-empresa-show', $empresa)">{{ $empresa->titulo }}</x-breath>

    <x-breath::attribute title="hello" :value="$empresa->titulo"/>

</x-breath>