<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;

class LogSuccessfulLogout
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(Logout $event): void
    {
        activity('Authentication')
            ->causedBy($event->user)
            ->withProperties([
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
                'email' => $event->user->email,
            ])
            ->log($event->user->email . ' logged out');
    }
}
