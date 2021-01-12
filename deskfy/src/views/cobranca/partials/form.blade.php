<x-breath::card>

<!-- TODO: implementar a empresa neste formulário -->
{!! Form::hidden('empresa_id', Deskfy\Models\Empresa::first()->id) !!}

<div class="row">
    <div class="col-lg-5">
        <x-breath::form-element name="Selecione a entidade" attribute="entidade_id" type="select" :list="Deskfy\Models\Entidade::orderBy('titulo')->pluck('titulo', 'id')->toArray()">
            <x-slot name="hint">Informe a entidade associada a esta cobrança</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-7">
        <x-breath::form-element name="Título da cobrança" attribute="titulo">
            <x-slot name="hint">Informe o título da cobrança. <strong class="text-success">O título identifica a cobrança e será exibido para a entidade</strong></x-slot>
        </x-breath>
    </div>
</div>

<x-breath::form-element name="Descrição" type="textarea">
    <x-slot name="hint">Informe uma descrição para a cobrança. <strong class="text-success">A descrição será exibida para a entidade e tem como objetivo explicar os itens que estão sendo cobrados</strong></x-slot>
</x-breath>

<div class="row">
    <div class="col-lg-3">
        <x-breath::form-element name="Valor" type="number">
            <x-slot name="prepend"><span class="input-group-text">R$</span></x-slot>
            <x-slot name="hint">Informe o valor da cobrança. <strong class="text-success">Em caso de cobranças que se repetem, informe o valor da parcela</strong></x-slot>
        </x-breath>
    </div>
    <div class="col-lg-3">
        <x-breath::form-element name="Dia do vencimento" attribute="vence_em" type="date">
            <x-slot name="hint">Informe a data do vencimento</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-3">
        <x-breath::form-element name="Cobrança recorrente?" attribute="recorrente" :list="[0 => 'Não', 1 => 'Sim']" type="select">
            <x-slot name="hint">Informe se a cobrança deverá ser recorrente</x-slot>
        </x-breath>
    </div>
</div>

<x-breath::form-element name="Observações" attribute="observacao" type="textarea">
    <x-slot name="hint">Preencha caso deseje adicionar observações para esta cobrança. <strong class="text-success">Este campo é opcional</strong></x-slot>
</x-breath>

<button type="submit" class="btn btn-success btn-lg">{{ $submit_text ?? 'Salvar' }}</button>
</x-breath>