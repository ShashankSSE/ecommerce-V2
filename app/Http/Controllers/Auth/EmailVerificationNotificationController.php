<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        try {
            $request->user()->sendEmailVerificationNotification();
            
            // If you want to flash a success message to the session
            // session()->flash('status', 'verification-link-sent');
        
            // If you want to return a response with a success message
            // return redirect()->back()->with('status', 'verification-link-sent');
        
            // If you're returning a JSON response
            // return response()->json(['message' => 'Verification email sent'], 200);
            
            // If you want to dispatch an event after email verification is sent
            // event(new Verified($request->user()));
        } catch (\Exception $e) {
            // Log the error or handle it in any other way
            // For example, you could flash an error message to the session
            // session()->flash('error', 'Failed to send verification email');
            
            // If you want to return a response with an error message
            // return redirect()->back()->with('error', 'Failed to send verification email');
        
            // If you're returning a JSON response
            // return response()->json(['error' => 'Failed to send verification email'], 500);
            dd($e->getMessage());
        }

        return back()->with('status', 'Please try again later.');
    }
}
