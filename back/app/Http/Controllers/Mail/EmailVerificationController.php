<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    /**
     * Verify email user
     * 
     * @param EmailVerificationRequest $request
     * 
     * @return [type]
     */
    public function verifyUser(EmailVerificationRequest $request)
    {
        $request->fulfill();

        $redirectUrl = $request->query('redirect');

        if ($redirectUrl && str_starts_with($redirectUrl, config('app.frontend_url'))) {
            return redirect($redirectUrl);
        }
    }

    /**
     * Resend notification for email verification
     * 
     * @param Request $request
     * 
     * @return [type]
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'message' => __('mail.already_verified')
            ]);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json([
            'message' => __('mail.verification_sent')
        ]);
    }
}
