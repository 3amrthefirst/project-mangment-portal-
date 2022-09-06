<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendWelcomeMail extends Notification
{
    use Queueable;

    protected $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Hello, ' . $this->ticket->client_name)
            ->line('A WELCOME FROM THE PRESIDENT.')
            ->action('Check Welcome mail', url($this->getPath()))
            ->line('Thank you for choosing All Premium!')
            ->salutation('Regards Boxbyld')
            ->attach($this->getPath(), [
                'as'   => 'welcome_package.pdf',
                'mime' => 'application/pdf'
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => [
                'id'         => $this->ticket->id,
                'name'       => $this->ticket->client_name,
                'event_type' => 'welcome_email_sent'
            ]
        ];
    }

    private function getPath()
    {
        return $this->ticket["pdf_path"];
    }

}
