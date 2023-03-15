<?php

namespace Itecschool\AuditPkg\Http\Events\Action\Listeners\ExportEvent;

use Itecschool\AuditPkg\Notifications\Action\ExportNotification;
use Itecschool\AuditPkg\Http\Events\Action\Events\ExportEvent;
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