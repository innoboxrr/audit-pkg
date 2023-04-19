<?php

namespace Itecschool\AuditPkg\Http\Events\Action\Events;

use Itecschool\AuditPkg\Models\Action;
use Itecschool\AuditPkg\Http\Requests\Action\UpdateRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $action;

    public $request;

    public $response;

    public $locale;

    public function __construct(Action $action, UpdateRequest $request, $response)
    {
        
        $this->action = $action;

        $this->request = $request;

        $this->response = $response;

        $this->locale = ($this->request->hasSession() && $this->request->getSession()->has('locale')) ? 
            $this->request->getSession()->get('locale') : 
            'en';

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {
        
        return new PrivateChannel('channel-name');

    }

}