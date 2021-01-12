@section('title', $empresa->titulo . ' - Minha empresa')
<x-breath::app>

    <x-breath::title :breadcrumbs="Breadcrumbs::render('deskfy-empresa-show', $empresa)">{{ $empresa->titulo }}</x-breath>

    <x-breath::card title="Informações da empresa">

        <div class="row">
            <div class="col-lg-9"><x-breath::attribute title="Título" :value="$empresa->titulo"/></div>
            <div class="col-lg-3"><x-breath::attribute title="Código" :value="$empresa->codigo"/></div>
        </div>
        
        <div class="row">
            <div class="col-lg-2"><x-breath::attribute title="CEP" :value="$empresa->cep"/></div>
            <div class="col-lg-5"><x-breath::attribute title="Endereço" :value="$empresa->endereco"/></div>
            <div class="col-lg-2"><x-breath::attribute title="Número" :value="$empresa->numero"/></div>
            <div class="col-lg-3"><x-breath::attribute title="Bairro" :value="$empresa->bairro"/></div>
        </div>

        <div class="row">
            <div class="col-lg-4"><x-breath::attribute title="Cidade" :value="$empresa->cidade"/></div>
            <div class="col-lg-2"><x-breath::attribute title="Estado" :value="$empresa->estado"/></div>
            <div class="col-lg"><x-breath::attribute title="Complemento" :value="$empresa->complemento"/></div>
        </div>
    </x-breath>

    <x-breath::card title="Informações adicionais">
        <x-breath::attribute title="Observações" :value="$empresa->observacao"/>
    </x-breath>

</x-breath>