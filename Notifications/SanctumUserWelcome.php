<?php

namespace App\Containers\Vendor\Sanctum\Notifications;

use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SanctumUserWelcome extends ParentNotification implements ShouldQueue
{
    use Queueable;
private $token;
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $message = (new MailMessage())
            ->subject('Welcome to ' . config('app.name'));
        if (config('sanctum.notify_user_token_by_email')) {
            $message->lines(['Thank you for registering ' . $notifiable->name, 'Your Access Token is: ' . $this->token, 'please keep it safe and don\'t share it with anyone.']);
        } else {
            $message->line('Thank you for registering ' . $notifiable->name);;
        }

        return $message;
    }
}
