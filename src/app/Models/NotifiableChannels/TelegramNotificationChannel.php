<?php

namespace App\Models\NotifiableChannels;

/**
 * @property integer $id
 * @property string $channel_id
 * @property string $created_at
 * @property string $updated_at
 */

class TelegramNotificationChannel extends AbstractNotifiableChannel
{

    public function viaChannel(): string
    {
        return 'telegram';
    }

    public function notificationDestination(): string
    {
        return $this->channel_id;
    }

    public function prepareMessage(string $type, string $message): string
    {
        return "*{$type}*\n\n{$message}";
    }

}
