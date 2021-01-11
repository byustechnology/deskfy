@component('mail::message')
# Fatura paga


Olá, {{ $cobranca->entidade->responsavel }}, 

A sua fatura referente ao serviço **{{ $cobranca->titulo }}** foi paga!


# Próxima cobrança
@if ( ! empty($cobrancaRecorrente))
    A sua próxima cobrança referente a este serviço será no dia {{ $cobrancaRecorrente->vence_em->format('d/m/Y') }}.
@endif

Agradecemos a sua escolha e também a confiança em nossos serviços.
Obrigado,<br>
{{ config('app.name') }}
@endcomponent