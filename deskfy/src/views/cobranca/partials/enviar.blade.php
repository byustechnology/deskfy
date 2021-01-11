<x-breath::modal title="Enviar cobrança" id="m-enviar">
    {!! Form::open(['url' => $cobranca->path() . '/enviar']) !!}

        <div class="modal-body">
            <x-breath::form-element name="Destinatários" :value="implode(';', $cobranca->entidade->emails()->pluck('valor')->toArray())">
                <x-slot name="hint">Informe os destinatários que irão receber o e-mail de cobrança. <strong class="text-success">Você pode enviar para mais de um destinatário separando os e-mails com ; (ponto vírgula)</strong></x-slot>
            </x-breath>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Enviar cobrança</button>
        </div>

    {!! Form::close() !!}

</x-breath>