<?php

// app/Mail/VerificationCodeMail.php

// app/Mail/VerificationCodeMail.php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $verificationCode;

    public function __construct(User $user, $verificationCode)
    {
        $this->user = $user;
        $this->verificationCode = $verificationCode;
    }

    public function build()
    {
        return $this->markdown('emails.verification_code')
            ->subject('Verification Code')
            ->with([
                'user' => $this->user,
                'verificationCode' => $this->verificationCode,
            ]);
    }
}
