<?php

namespace Innoboxrr\LaravelAudit\Http\Events\Action\Listeners\ExportEvent;

use Innoboxrr\LaravelAudit\Notifications\Action\ExportNotification;
use Innoboxrr\LaravelAudit\Http\Events\Action\Events\ExportEvent;
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