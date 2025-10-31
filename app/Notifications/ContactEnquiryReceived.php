<?php

namespace App\Notifications;

use App\Models\ContactEnquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactEnquiryReceived extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public ContactEnquiry $enquiry)
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
        $message = (new MailMessage)
            ->subject('New Contact Enquiry from '.$this->enquiry->name)
            ->greeting('New Contact Enquiry Received!')
            ->line('You have received a new contact enquiry from your website.')
            ->line('**Name:** '.$this->enquiry->name)
            ->line('**Email:** '.$this->enquiry->email)
            ->line('**Phone:** '.$this->enquiry->phone);

        // Add subject if it exists
        if ($this->enquiry->subject) {
            $message->line('**Subject:** '.$this->enquiry->subject);
        }

        $message->line('**Message:**')
            ->line($this->enquiry->message)
            ->line('Please respond to this enquiry as soon as possible.');

        return $message;
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
