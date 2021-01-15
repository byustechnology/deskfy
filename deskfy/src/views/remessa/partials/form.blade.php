<x-breath::card title="Informações da remessa">
    <x-breath::input label="Título da remessa" attribute="titulo">
        <x-slot name="hint">Digite o título da remessa</x-slot>
    </x-breath>
    <x-breath::textarea label="Observações" attribute="observacao">
        <x-slot name="hint">Utilize este campo para informar uma observação da remessa. <strong class="text-success">Este campo é opcional</strong></x-slot>
    </x-breath>
</x-breath>

<x-breath::form-footer>
    <button type="submit" class="btn btn-success btn-lg">{{ $submit_text ?? 'Salvar' }}</button>
</x-breath::form-footer>