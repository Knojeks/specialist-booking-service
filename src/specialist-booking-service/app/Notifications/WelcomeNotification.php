<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeNotification extends Notification
{
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Регистрация в сервисе записи к врачам')
            ->greeting('Здравствуйте, '.$notifiable->name.'!')
            ->line('Ваш аккаунт успешно создан.')
            ->action('Открыть личный кабинет', route('dashboard'))
            ->salutation('Сервис записи к врачам');
    }
}
