<?php

namespace App\Containers\Vendor\Sanctum\Notifications;

use App\Ship\Parents\Notifications\Notification as ParentNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class ReIssueuserToken extends ParentNotification
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
            ->subject('Your Request To Reissue Token for ' . config('app.name'));
        if (config('sanctum.notify_user_token_by_email')) {
            $message->lines([ $notifiable->name . ', You Have requested to reissue your access token', 'Your New Access Token is: ' . $this->token , 'Please keep it safe and don\'t share it with anyone.', 'If you did not make this request, YOU MUST Call Support Immediately and make sure you Make a new Reissue request']);
        } else {
            $message->lines([$notifiable->name . 'Your Access Token Has Been reset','If you did not make this request, YOU MUST Call Support Immediately and make sure you Make a new Reissue request' ]);;
        }

        return $message;
    }
}
