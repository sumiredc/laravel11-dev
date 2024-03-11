<?php

declare(strict_types=1);

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

final class EmailVerificationNotification extends Notification
{
    use Queueable;

    /**
     * @param string $password
     */
    public function __construct(
        public readonly string $password
    ) {
    }

    /**
     * @param  User               $notifiable
     * @return array<int, string>
     */
    public function via(User $notifiable): array
    {
        return ['mail'];
    }

    /**
     * @param  User        $notifiable
     * @return MailMessage
     */
    public function toMail(User $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line(__('Password') . ": {$this->password}")
            ->line(__('Please verify your email address by clicking the button below.'))
            ->action(__('Verify Email Address'), url("/verified-email/{$notifiable->uuid}"));
    }
}
