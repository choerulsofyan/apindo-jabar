<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogFailedLogin
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Failed $event): void
    {
        $credentials = $event->credentials;
        $email = $credentials['email'] ?? null;

        activity('Authentication')
            ->withProperties([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
                'email' => $email,
            ])
            ->log($email . ' login attempt failed');
    }
}
