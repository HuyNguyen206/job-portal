<?php

namespace App\Notifications;

use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendJobToFriendNotification extends Notification
{
    use Queueable;
    private $sender, $jobUrl, $jobPosition;

    /**
     * Create a new notification instance.
     *
     * @param User $sender
     * @param $jobUrl
     * @param $jobPosition
     */
    public function __construct(User $sender, $jobUrl, $jobPosition)
    {
        //
        $this->sender = $sender;
        $this->jobUrl = $jobUrl;
        $this->jobPosition = $jobPosition;
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
                ->subject('Job referal notification')
                    ->line("{$this->sender->name} has sent this job to you")
                    ->line("Job position: $this->jobPosition")
                    ->action('Go to this job', url($this->jobUrl))
                    ->line('Thank you for using our application!');
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
