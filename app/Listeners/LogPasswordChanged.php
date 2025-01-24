<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;

class LogPasswordChanged
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(PasswordReset $event): void
    {
        activity('Authentication')
            ->causedBy($event->user)
            ->withProperties([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
                'email' => $event->user->email,
            ])
            ->log($event->user->email . ' password changed');
    }
}
