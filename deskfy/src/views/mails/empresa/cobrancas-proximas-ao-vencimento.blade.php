@component('mail::message')
# Vencimentos próximos
Abaixo estão listadas as cobranças próximos do vencimento (até 15 dias para o vencimento).
É necessário verificar a emissão das notas fiscais e também o preparo dos boletos.

@foreach($cobrancas as $cobranca)
    {{ $cobranca->entidade->titulo }}
@endforeach

Obrigado,<br>
{{ config('app.name') }}
@endcomponent