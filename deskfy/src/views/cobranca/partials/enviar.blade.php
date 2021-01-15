<x-breath::modal title="Enviar cobrança" id="m-enviar">
    {!! Form::open(['url' => $cobranca->path() . '/enviar']) !!}

        <div class="modal-body">

            @if ( $cobranca->boletos->count() == 0)
                <x-breath::alert type="danger" message="Atenção: Não foi gerado nenhum boleto para esta cobrança. Deseja enviar a cobrança mesmo assim?" icon="fas fa-exclamation-circle"/>
            @endif

            <x-breath::input label="Destinatários" attribute="destinatarios" :value="implode(';', $cobranca->entidade->emails()->pluck('valor')->toArray())">
                <x-slot name="hint">Informe os destinatários que irão receber o e-mail de cobrança. <strong class="text-success">Você pode enviar para mais de um destinatário separando os e-mails com ; (ponto vírgula)</strong></x-slot>
            </x-breath>
            <x-breath::alert message="Você pode cadastrar os destinatários em uma entidade. Eles serão exibidos automaticamente no campo acima." icon="fas fa-exclamation-circle"/>
        </div>

        
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Enviar cobrança</button>
        </div>

    {!! Form::close() !!}

</x-breath>