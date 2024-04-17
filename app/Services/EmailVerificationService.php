<?php

namespace App\Services;

use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailVerificationService extends Service
{
    public static function sendMail($user)
    {
        // Generate verification code
        $verificationCode = rand(000000, 999999); // Change 6 to the desired length of your verification code

        // Save verification code in database
        $user->verification_code = $verificationCode;
        $user->save();

        // Send verification code via email
        Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

        return true;
    }

    public function verify($request)
    {
        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();

        // If user and code match, mark email as verified
        if ($user) {
            $user->email_verified_at = now();
            $user->verification_code = null;
            $user->save();
            return true;
        }
        return false;
    }
}
