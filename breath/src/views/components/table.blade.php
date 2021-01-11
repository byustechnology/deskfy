@if ( ! $resource->isEmpty())
<div class="table-responsive">
    <table {{ $attributes->merge(['class' => 'table align-middle']) }}>

        @if (isset($header))
            <thead>
                {{ $header }}
            </thead>
        @endif

        @if (isset($body))
            <tbody>
                {{ $body }}
            </tbody>
        @endif

        @if (isset($footer))
            <tfoot>
                {{ $footer }}
            </tfoot>
        @endif

    </table>
</div>
@else
    <x-breath::alert icon="fas fa-exclamation-circle" message="Nenhum registro encontrado."/>
@endif