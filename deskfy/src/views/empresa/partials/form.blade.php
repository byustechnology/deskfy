<x-breath::card title="Informações da empresa">
    <div class="row">
        <div class="col-lg-2">
            <x-breath::input label="Código" attribute="codigo">
                <x-slot name="hint">Informe um código para a sua empresa. <strong class="text-danger">O código deve ser único</strong></x-slot>
            </x-breath>
        </div>
        <div class="col-lg-7">
            <x-breath::input label="Título da empresa" attribute="titulo">
                <x-slot name="hint">Digite o título da sua empresa (Razão social)</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-3">
            <x-breath::input label="Documento" attribute="documento">
                <x-slot name="hint">Informe o documento referente a sua empresa (CNPJ)</x-slot>
            </x-breath>
        </div>
    </div>
</x-breath>
<x-breath::card title="Informações do endereço">
    <div class="row">
        <div class="col-lg-2">
            <x-breath::input label="CEP" attribute="cep">
                <x-slot name="hint">Insira o CEP referente ao endereço (somente números)</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-5">
            <x-breath::input label="Endereço" attribute="endereco">
                <x-slot name="hint">Informe o endereço referente a entidade</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-2">
            <x-breath::input label="Número" attribute="numero">
                <x-slot name="hint">Informe o número referente ao endereço</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-3">
            <x-breath::input label="Bairro" attribute="bairro">
                <x-slot name="hint">Informe o bairro referente ao endereço</x-slot>
            </x-breath>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <x-breath::input label="Complemento" attribute="complemento">
                <x-slot name="hint">Informe este campo caso o endereço necessite de algum complemento. <strong class="text-success">Este campo é opcional</strong></x-slot>
            </x-breath>
        </div>
        <div class="col-lg-3">
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
</x-breath>

<x-breath::card title="Informações de contato">
    <div class="row">
        <div class="col-lg-3">
            <x-breath::input label="E-mail" attribute="email">
                <x-slot name="hint">Informe um e-mail para a empresa</x-slot>
            </x-breath>
        </div>
        <div class="col-lg-3">
            <x-breath::input label="Telefone" attribute="telefone">
                <x-slot name="hint">Informe um telefone para e empresa. <strong class="text-danger">O telefone deve conter o DDD</strong></x-slot>
            </x-breath>
        </div>
    </div>
</x-breath>
<x-breath::card title="Informações adicionais">
    <x-breath::textarea label="Observações" attribute="observacao">
        <x-slot name="hint">Utilize este campo para informar observações internas da empresa. <strong class="text-success">Este campo é opcional</strong></x-slot>
    </x-breath>
</x-breath>

<x-breath::form-footer>
    <button type="submit" class="btn btn-success btn-lg">{{ $submit_text ?? 'Salvar' }}</button>
</x-breath::form-footer>