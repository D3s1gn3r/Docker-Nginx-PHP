<?php

namespace App\Models\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $channel
 * @property string $response
 * @property string $created_at
 * @property string $updated_at
 */

class NotifiableMessageStatus extends Model
{
    use HasFactory;
}
