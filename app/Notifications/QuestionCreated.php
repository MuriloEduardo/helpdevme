<?php

namespace App\Notifications;

use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QuestionCreated extends Notification implements ShouldQueue
{
    use Queueable;

	protected $question;

	/**
	 * Create a new notification instance.
	 *
	 * @return void
	 */
	public function __construct(Question $question)
	{
		$this->question = $question;
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
					->subject('Pedido de ajuda! Recompensa de R$' . $this->question->budget)
					->greeting('Olá ' . $notifiable->name . '! ' . $this->question->user->name . ' está com essa dúvida:')
					->line($this->question->body)
                    ->action('Fazer Proposta', url('/' . $this->question->slug));
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
