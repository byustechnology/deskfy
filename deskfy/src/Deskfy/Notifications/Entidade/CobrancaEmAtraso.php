<?php

namespace Deskfy\Notifications\Entidade;

use Deskfy\Models\Cobranca;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CobrancaEmAtraso extends Notification
{
    use Queueable;

    protected $cobranca;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Cobranca $cobranca)
    {
        $this->cobranca = $cobranca;
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
            ->markdown('deskfy::mails.entidade.cobranca-em-atraso');
            ->subject(config('app.name') . ' - Cobrança pendente - ' . $this->cobranca->titulo)
                    
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
