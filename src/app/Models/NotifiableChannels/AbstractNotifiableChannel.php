<?php

namespace App\Models\NotifiableChannels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

abstract class AbstractNotifiableChannel extends Model
{
    use Notifiable;

    abstract public function viaChannel(): string;

    abstract public function notificationDestination(): string;

    abstract public function prepareMessage(string $type, string $message): string;

}
