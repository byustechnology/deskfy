<x-breath::modal title="Anexar boletos" id="m-boleto">
    {!! Form::open(['url' => request()->url() . '/boleto', 'method' => 'post']) !!}

        <div class="modal-body">
            <x-breath::table :resource="$boletos" class="table-borderless table-striped">
                <x-slot name="body">
                    @foreach($boletos as $boleto)
                        <tr>
                            <td style="width: 16px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $boleto->id }}" name="boletos[]">
                                </div>
                            </td>
                            <td>
                                <span class="fw-bold">{{ $boleto->cobranca->titulo }}</span><br>
                                <small class="text-muted"><span class="fw-bold">R$ {{ number_format($boleto->cobranca->valor, 2, ',', '.') }}</span> - Venc. {{ $boleto->cobranca->vence_em->format('d/m/Y') }}</small>
                            </td>
                        </tr>
                    @endforeach
                </x-slot>
            </x-breath>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Anexar boleto(s)</button>
        </div>

    {!! Form::close() !!}

</x-breath>