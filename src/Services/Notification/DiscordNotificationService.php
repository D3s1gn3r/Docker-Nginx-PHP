<?php

namespace Services\Notification;

use App\Models\NotifiableChannels\DiscordChannel;
use App\Notifications\ChatInfoNotification;
use Services\Notification\Interfaces\ApplicationNotificationServiceInterface;

class DiscordNotificationService implements ApplicationNotificationServiceInterface
{

    public function sendQueueMessage(string $type, string $message)
    {
        app(DiscordChannel::class)->notify(new ChatInfoNotification());
    }
}
