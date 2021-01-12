<x-breath::modal title="Confirmar pagamento" id="m-baixar">
    {!! Form::open(['url' => $cobranca->path() . '/baixar', 'method' => 'post']) !!}

        <div class="modal-body">
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" name="notificar" id="notificar">
                <label class="form-check-label fw-bold d-block" for="notificar">Notificar destinatários?</label>
                <small class="text-muted mt-2">Marque essa opção para que os destinatários ({{ implode(';', $cobranca->entidade->emails()->pluck('valor')->toArray()) }}) recebam um e-mail de confirmação da cobrança.</small>
            </div>
            <x-breath::input-date name="Data do pagamento" :value="today()->format('Y-m-d')" attribute="pago_em">
                <x-slot name="hint">Informe a data na qual o pagamento foi realizado.</x-slot>
            </x-breath>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Confirmar pagamento</button>
        </div>

    {!! Form::close() !!}

</x-breath>