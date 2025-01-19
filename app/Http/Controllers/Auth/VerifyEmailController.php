<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): JsonResponse|RedirectResponse|Response
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['status' => 'user-already-verified']);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));

            return response()->json(['status' => 'email-verified']);
        }

        return response()->json(['status' => 'verification-link-sent']);
    }
}
