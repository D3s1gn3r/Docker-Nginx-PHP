<?php

namespace Database\Seeders;

use App\Models\NotifiableChannels\DiscordNotificationChannel;
use App\Models\NotifiableChannels\TelegramNotificationChannel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $discordChannel = new DiscordNotificationChannel();
        $discordChannel->channel_id = '1196182111787425906';
        $discordChannel->save();

        $telegramChannel = new TelegramNotificationChannel();
        $telegramChannel->channel_id = '-1002077895035';
        $telegramChannel->save();
    }
}
