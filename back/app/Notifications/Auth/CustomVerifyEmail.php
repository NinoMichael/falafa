<?php

namespace App\Notifications\Auth;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;

class CustomVerifyEmail extends BaseVerifyEmail
{
    /**
     * @param mixed $notifiable
     * 
     * @return [type]
     */
    protected function verificationUrl($notifiable)
    {
        $temporaryUrl = URL::temporarySignedRoute(
            'verification.verify', Carbon::now()->addMinutes(60), [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );

        return str_replace(config('app.url'), config('app.frontend_url'), $temporaryUrl);
    }

    /**
     * @param mixed $notifiable
     * 
     * @return [type]
     */
    public function toMail($notifiable)
    {
        $url = $this->verificationUrl($notifiable);

        return (new MailMessage)
            ->subject('🎉 Bienvenue sur Falafa – Vérifiez votre adresse email')
            ->greeting('Bonjour à vous 👋')
            ->line("Merci de vous être inscrit sur notre plateforme Falafa.")
            ->line("Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse email.")
            ->action('✔️ Vérifier mon email', $url)
            ->line("Si vous n'avez pas créé de compte, vous pouvez ignorer ce message.")
            ->salutation("À très bientôt sur Falafa !");
    }
}
