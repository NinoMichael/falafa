<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function verifyUser(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return response()->json([
            'message' => 'Email verified successfully.'
        ]);
    }

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
