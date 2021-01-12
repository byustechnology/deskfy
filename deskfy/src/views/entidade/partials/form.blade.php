<x-breath::card title="Informações da entidade">
    <div class="row">
        <div class="col-lg-3">
            <x-breath::select label="Tipo" attribute="tipo" :list="Deskfy\Models\Entidade::TIPOS">
                <x-slot name="hint">Informe o tipo de pessoa (física ou jurídica)</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-3">
            <x-breath::input label="Código" attribute="codigo">
                <x-slot name="hint">Informe um código para a sua entidade. <strong class="text-danger">O código deve ser único</strong></x-slot>
            </x-breath>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <x-breath::input label="Título da entidade" attribute="titulo">
                <x-slot name="hint">Digite o título da sua entidade. <strong class="text-success">Para pessoas físicas, digite o nome. No caso de pessoa jurídica, digite a razão social da empresa</strong></x-slot>
            </x-breath>
        </div>
        <div class="col-lg-4">
            <x-breath::input label="Documento" attribute="documento">
                <x-slot name="hint">Informe o CPF para pessoas físicas ou o CNPJ para pessoas jurídicas</x-slot>
            </x-breath>
        </div>
    </div>

    <x-breath::input label="Responsável" attribute="responsavel">
        <x-slot name="hint">Informe o nome do responsável por esta entidade</x-slot>
    </x-breth>

    <div class="row">
        <div class="col-lg-3">
            <x-breath::input label="CEP" attribute="cep">
                <x-slot name="hint">Insira o CEP referente ao endereço (somente números)</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-7">
            <x-breath::input label="Endereço" attribute="endereco">
                <x-slot name="hint">Informe o endereço referente a entidade</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-2">
            <x-breath::input label="Número" attribute="numero">
                <x-slot name="hint">Informe o número referente ao endereço</x-slot>
            </x-breath>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <x-breath::input label="Bairro" attribute="bairro">
                <x-slot name="hint">Informe o bairro referente ao endereço</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-6">
            <x-breath::input label="Cidade" attribute="cidade">
                <x-slot name="hint">Informe a cidade referente ao endereço</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-3">
            <x-breath::select label="Estado" attribute="estado" :list="Deskfy\Models\Estado::BRASIL">
                <x-slot name="hint">Informe o estado referente a cidade</x-slot>
            </x-breath>
        </div>
    </div>

    <x-breath::input label="Complemento" attribute="complemento">
        <x-slot name="hint">Informe este campo caso o endereço necessite de algum complemento. <strong class="text-success">Este campo é opcional</strong></x-slot>
    </x-breath>

    <x-breath::textarea label="Observações" attribute="observacao">
        <x-slot name="hint">Utilize este campo para informar observações internas da entidade. <strong class="text-success">Este campo é opcional</strong></x-slot>
    </x-breath>

    <button type="submit" class="btn btn-success btn-lg">{{ $submit_text ?? 'Salvar' }}</button>
</x-breath>
