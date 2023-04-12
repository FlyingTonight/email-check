<?php

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Users;
use Carbon\Carbon;

class SendSubscriptionEndingEmails extends Command
{
    protected $signature = 'email:subscription-ending';
    protected $description = 'Send email notification to users whose subscription is ending soon';

    public function handle()
    {
        $users = Users::where('subscription_end_date', '>=', Carbon::today()->addDays(1))
                     ->where('subscription_end_date', '<=', Carbon::today()->addDays(3))
                     ->get();

        foreach ($users as $user) {
            Mail::send('emails.subscription-ending', ['username' => $user->name], function ($message) use ($user) {
                $message->to($user->email)->subject('Subscription Ending Soon');
            });
        }

        $this->info('Subscription ending emails sent successfully!');
    }
}
