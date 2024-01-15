<?php

namespace App\Models\NotifiableChannels;

use NotificationChannels\Discord\DiscordChannel;

/**
 * @property integer $id
 * @property string $channel_id
 * @property string $created_at
 * @property string $updated_at
 */

class DiscordNotificationChannel extends AbstractNotifiableChannel
{

    public function viaChannel(): string
    {
        return DiscordChannel::class;
    }

    public function notificationDestination(): string
    {
        return $this->channel_id;
    }

    public function prepareMessage(string $type, string $message): string
    {
        return "**{$type}**\n\n{$message}";
    }

    public function routeNotificationForDiscord()
    {
        return $this->notificationDestination();
    }


}
