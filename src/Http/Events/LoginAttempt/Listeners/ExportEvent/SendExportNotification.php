<?php

namespace Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Listeners\ExportEvent;

use Innoboxrr\LaravelAudit\Notifications\LoginAttempt\ExportNotification;
use Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events\ExportEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendExportNotification
{

    public function __construct()
    {
        //
    }

    public function handle(ExportEvent $event)
    {

        $event->request
            ->user()
            ->notify((new ExportNotification($event->request))->locale($event->locale));

    }

}