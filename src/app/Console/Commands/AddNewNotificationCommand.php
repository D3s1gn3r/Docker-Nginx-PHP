<?php

namespace App\Console\Commands;

use App\Models\NotifiableChannels\DiscordNotificationChannel;
use App\Models\NotifiableChannels\TelegramNotificationChannel;
use App\Notifications\ChatInfoNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class AddNewNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send new notification to available users';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $channel = $this->choice(
            'Which channel should be notified?',
                ['Telegram', 'Discord'],
                0
            );

        $type = $this->choice(
            'What type of message should be sent?',
            ['Notification', 'Warning'],
            0
        );

        $message = $this->ask('Please, insert your message', 'Hello world!');

        if(!$message){
            throw new \Exception('Error! Message cannot be empty!');
        }

        if($channel == 'Discord'){
            $not = app(DiscordNotificationChannel::class);
        }
        elseif ($channel == 'Telegram'){
            $not = app(TelegramNotificationChannel::class);
        }
        else {
            throw new \Exception('Error! Notification centre is not exist.');
        }

        Notification::send($not::all(), new ChatInfoNotification($type, $message));
    }
}
