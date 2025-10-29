<?php

namespace App\Notifications;

use App\Models\Enquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EnquiryReceived extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Enquiry $enquiry)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Enquiry from '.$this->enquiry->name)
            ->greeting('New Enquiry Received!')
            ->line('You have received a new enquiry from your website.')
            ->line('**Name:** '.$this->enquiry->name)
            ->line('**Email:** '.$this->enquiry->email)
            ->line('**Phone:** '.$this->enquiry->phone)
            ->line('**Service:** '.$this->enquiry->service_name)
            ->line('**Message:**')
            ->line($this->enquiry->message)
            ->line('Please respond to this enquiry as soon as possible.');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'enquiry_id' => $this->enquiry->id,
            'name' => $this->enquiry->name,
            'email' => $this->enquiry->email,
        ];
    }
}
