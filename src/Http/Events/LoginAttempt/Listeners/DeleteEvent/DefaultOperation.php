<?php

namespace Itecschool\AuditPkg\Http\Events\LoginAttempt\Listeners\DeleteEvent;

use Itecschool\AuditPkg\Http\Events\LoginAttempt\Events\DeleteEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DefaultOperation
{
    
    public function __construct()
    {
        //
    }

    public function handle(DeleteEvent $event)
    {

        //

    }

}
