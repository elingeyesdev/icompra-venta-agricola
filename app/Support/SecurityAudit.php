<?php

namespace App\Support;

use Illuminate\Support\Facades\Log;

class SecurityAudit
{
    public static function record(string $event): void
    {
        Log::channel('security')->info($event, [
            'event' => $event,
            'occurred_at' => now()->toIso8601String(),
            'user_id' => auth()->id(),
            'ip' => request()->ip(),
        ]);
    }
}