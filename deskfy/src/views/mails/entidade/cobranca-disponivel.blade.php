@component('mail::message')
# Cobrança disponível

Olá, {{ $cobranca->entidade->responsavel }}, 

Informamos que a sua cobrança referente ao serviço **{{ $cobranca->titulo }}** com vencimento para {{ $cobranca->vence_em->format('d/m/Y') }} já está disponível para pagamento. Abaixo estão listados maiores informações sobre a cobrança.

# Informações da cobrança

Cobrança: **{{ $cobranca->titulo }}**

Vencimento: **{{ $cobranca->vence_em->format('d/m/Y') }}**

Valor: **R$ {{ number_format($cobranca->valor, 2, ',', '.') }}**

Descrição: **{{ $cobranca->descricao }}**

# Instruções e dúvidas

Caso já tenha efetuado o pagamento, desconsidere este e-mail.
Os arquivos estão anexados neste e-mail. Em caso de dúvidas, entre em contato conosco através do e-mail atendimento@byus.com.br.
Desde já, agradeço a sua atenção e preferência.

@if(!empty($arquivos))
    
# Informações dos anexos
    
@foreach($arquivos as $arquivo)
{{ $arquivo->arquivo }}<br><small>{{ $arquivo->observacao }}</small><br>
@endforeach
@endif

Obrigado,<br>
{{ config('app.name') }}
@endcomponent