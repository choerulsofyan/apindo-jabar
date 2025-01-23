<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class LogSuccessfulLogin
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Login $event): void
    {
        activity('Authentication')
            ->causedBy($event->user)
            ->withProperties([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
                'email' => $event->user->email,
            ])
            ->log($event->user->email . ' logged in');
    }
}
