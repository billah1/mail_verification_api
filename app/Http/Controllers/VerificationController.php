<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('verify-email');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|digits:6',
        ]);

        $user = User::where('email', auth()->user()->email)->first();

        if ($request->verification_code == $user->verification_code) {
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('home')->with('success', 'Email verified successfully!');
        }

        return back()->withErrors(['verification_code' => 'Invalid verification code. Please try again.']);
    }
}
