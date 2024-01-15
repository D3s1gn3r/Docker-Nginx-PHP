<?php

namespace App\Notifications;

use App\Models\NotifiableChannels\AbstractNotifiableChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use NotificationChannels\Discord\DiscordChannel;
use NotificationChannels\Discord\DiscordMessage;
use NotificationChannels\Telegram\TelegramMessage;

class ChatInfoNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private string $type, private string $message){}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(AbstractNotifiableChannel $notifiable)
    {
        return [$notifiable->viaChannel()];
    }

    public function viaQueues(): array
    {
        return [
            'telegram' => 'telegram-queue',
            DiscordChannel::class => 'discord-queue',
        ];
    }

    private function getCleanedNotificationMessage(AbstractNotifiableChannel $notifiable): string
    {
        return $notifiable->prepareMessage($this->type, $this->message);
    }

    public function toDiscord(AbstractNotifiableChannel $notifiable)
    {
        return DiscordMessage::create($this->getCleanedNotificationMessage($notifiable));
    }

    public function toTelegram(AbstractNotifiableChannel $notifiable)
    {
        return TelegramMessage::create()
            ->to($notifiable->notificationDestination())
            ->content($this->getCleanedNotificationMessage($notifiable));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
