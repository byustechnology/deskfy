<?php

namespace Deskfy\Notifications\Entidade;

use Deskfy\Models\Cobranca;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CobrancaDisponivel extends Notification
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
        $mail = (new MailMessage)
            ->markdown('deskfy::mails.entidade.cobranca-disponivel', [
                'cobranca' => $this->cobranca, 
                'arquivos' => $this->cobranca->arquivos()->whereNotNull('observacao')->get()
            ])
            ->subject(config('app.name') . ' - Cobrança disponível - ' . $this->cobranca->titulo);

        foreach ($this->cobranca->arquivos as $arquivo) {
            $mail->attach(storage_path('app/') . $arquivo->caminho . $arquivo->arquivo);
        }

        return $mail;
                    
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
