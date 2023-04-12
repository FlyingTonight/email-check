<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendSubscriptionEndingEmails extends Command
{
    protected $signature = 'subscription-ending-emails:send';
    protected $description = 'Send email notifications to users whose subscription is ending in three days';

    public function handle()
    {
        $users = DB::table('users')->where('subscription_end_date', '<=', now()->addDays(3))->get();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new SubscriptionEndingEmail($user));
        }
    }
}
