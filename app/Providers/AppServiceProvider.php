<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\ResetPassword;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->view('email.email-verification', ['url' => $url]);
        });

        ResetPassword::toMailUsing(function (object $notifiable, string $token) {
            return (new MailMessage)
            ->subject('Reset Password Notification')
            ->view('email.reset', ['url' => 'http://localhost:8000/reset-password/' . $token]);
        });
    }
}
