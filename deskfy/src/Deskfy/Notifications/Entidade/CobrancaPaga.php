<?php

namespace Deskfy\Notifications\Entidade;

use Deskfy\Models\Cobranca;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CobrancaPaga extends Notification
{
    use Queueable;

    protected $cobranca;

    protected $cobrancaRecorrente;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cobranca $cobranca, $cobrancaRecorrente = null)
    {
        $this->cobranca = $cobranca;
        $this->cobrancaRecorrente = $cobrancaRecorrente;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->markdown('deskfy::mails.entidade.cobranca-paga', [
                'cobranca' => $this->cobranca, 
                'cobrancaRecorrente' => $this->cobrancaRecorrente, 
            ])
            ->subject(config('app.name') . ' - Fatura paga! - ' . $this->cobranca->titulo);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
