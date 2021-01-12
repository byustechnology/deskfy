<x-breath::card title="Informações da cobrança">

<!-- TODO: implementar a empresa neste formulário -->
{!! Form::hidden('empresa_id', Deskfy\Models\Empresa::first()->id) !!}

<div class="row">
    <div class="col-lg-5">
        <x-breath::select label="Selecione a entidade" attribute="entidade_id" :list="Deskfy\Models\Entidade::orderBy('titulo')->pluck('titulo', 'id')->toArray()">
            <x-slot name="hint">Informe a entidade associada a esta cobrança</x-slot>
        </x-breath>
    </div>
    <div class="col-lg-7">
        <x-breath::input label="Título da cobrança" attribute="titulo">
            <x-slot name="hint">Informe o título da cobrança. <strong class="text-success">O título identifica a cobrança e será exibido para a entidade</strong></x-slot>
        </x-breath>
    </div>
</div>

<x-breath::textarea label="Descrição" attribute="descricao">
    <x-slot name="hint">Informe uma descrição para a cobrança. <strong class="text-success">A descrição será exibida para a entidade e tem como objetivo explicar os itens que estão sendo cobrados</strong></x-slot>
</x-breath>

<div class="row">
    <div class="col-lg-3">
        <x-breath::input-number label="Valor" attribute="valor">
            <x-slot name="prepend"><span class="input-group-text">R$</span></x-slot>
            <x-slot name="hint">Informe o valor da cobrança. <strong class="text-success">Em caso de cobranças que se repetem, informe o valor da parcela</strong></x-slot>
        </x-breath>
    </div>
    <div class="col-lg-3">
        <x-breath::input-date label="Dia do vencimento" attribute="vence_em" :value="isset($cobranca) ? optional($cobranca->vence_em)->format('Y-m-d') : null">
            <x-slot name="hint">Informe a data do vencimento</x-slot>
        </x-breath>
    </div>
</div>

<x-breath::textarea label="Observações" attribute="observacao">
    <x-slot name="hint">Preencha caso deseje adicionar observações para esta cobrança. <strong class="text-success">Este campo é opcional</strong></x-slot>
</x-breath>

</x-breath>

<x-breath::card title="Recorrência">
    <div class="row">
        <div class="col-lg-2">
            <x-breath::select x-on:chang="isRecorrente = $event.target.value" label="Recorrência" attribute="recorrente" :list="[
                '' => 'Por favor, selecione...', 
                0 => 'Não repetir', 
                1 => 'Repetir cobrança', 
                ]">
                <x-slot name="hint">Informe se esta cobrança deverá ser recorrente.</x-slot>
            </x-breath>
        </div>

        <div class="col-lg-3" x-show="false">
            <x-breath::select label="Frequência" attribute="repetir_a_cada" :list="[
                '' => 'Por favor, selecione..', 
                1 => 'Mensalmente', 
                3 => 'Trimestralmente', 
                6 => 'Semestralmente', 
                12 => 'Anualmente', 
                ]">
                <x-slot name="hint">Informe qual a frequência da recorrência</x-slot>
            </x-breath>
        </div>

        {!! Form::hidden('repetir_a_cada_condicao', 'm') !!}
    </div>
</x-breath>

<button type="submit" class="btn btn-success btn-lg">{{ $submit_text ?? 'Salvar' }}</button>