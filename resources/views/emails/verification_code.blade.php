<!-- resources/views/emails/verification_code.blade.php -->

@component('mail::message')
    # Verify Your Email

    Hello {{ $user->name }},

    Your verification code is: {{ $verificationCode }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
