<div class="row">
    <div class="col-lg-3">
        <x-breath::form-element name="Tipo" type="select" :list="Deskfy\Models\Entidade::TIPOS">
            <x-slot name="hint">Informe o tipo de pessoa (física ou jurídica)</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-3">
        <x-breath::form-element name="Código">
            <x-slot name="hint">Informe um código para a sua entidade. <strong class="text-danger">O código deve ser único</strong></x-slot>
        </x-breath>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <x-breath::form-element name="Título da entidade" attribute="titulo">
            <x-slot name="hint">Digite o título da sua entidade. <strong class="text-success">Para pessoas físicas, digite o nome. No caso de pessoa jurídica, digite a razão social da empresa</strong></x-slot>
        </x-breath>
    </div>
    <div class="col-lg-4">
        <x-breath::form-element name="Documento">
            <x-slot name="hint">Informe o CPF para pessoas físicas ou o CNPJ para pessoas jurídicas</x-slot>
        </x-breath>
    </div>
</div>

<x-breath::form-element name="Responsável">
    <x-slot name="hint">Informe o nome do responsável por esta entidade</x-slot>
</x-breth>

<div class="row">
    <div class="col-lg-3">
        <x-breath::form-element name="CEP">
            <x-slot name="hint">Insira o CEP referente ao endereço (somente números)</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-7">
        <x-breath::form-element name="Endereço">
            <x-slot name="hint">Informe o endereço referente a entidade</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-2">
        <x-breath::form-element name="Número">
            <x-slot name="hint">Informe o número referente ao endereço</x-slot>
        </x-breath>
    </div>
</div>

<div class="row">
    <div class="col-lg-3">
        <x-breath::form-element name="Bairro">
            <x-slot name="hint">Informe o bairro referente ao endereço</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-6">
        <x-breath::form-element name="Cidade">
            <x-slot name="hint">Informe a cidade referente ao endereço</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-3">
        <x-breath::form-element name="Estado" type="select" :list="Deskfy\Models\Estado::BRASIL">
            <x-slot name="hint">Informe o estado referente a cidade</x-slot>
        </x-breath>
    </div>
</div>

<x-breath::form-element name="Complemento">
    <x-slot name="hint">Informe este campo caso o endereço necessite de algum complemento. <strong class="text-success">Este campo é opcional</strong></x-slot>
</x-breath>

<x-breath::form-element name="Observações" attribute="observacao" type="textarea">
    <x-slot name="hint">Utilize este campo para informar observações internas da entidade. <strong class="text-success">Este campo é opcional</strong></x-slot>
</x-breath>

<button type="submit" class="btn btn-success btn-lg">{{ $submit_text ?? 'Salvar' }}</button>
