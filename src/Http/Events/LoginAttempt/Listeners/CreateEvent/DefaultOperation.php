<?php

namespace Itecschool\AuditPkg\Http\Events\LoginAttempt\Listeners\CreateEvent;

use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\CreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DefaultOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(CreateEvent $event)
    {

        //

    }

}