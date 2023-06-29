<?php

namespace Innoboxrr\LaravelAudit\Http\Events\LoginAttempt\Events;

use Innoboxrr\LaravelAudit\Models\LoginAttempt;
use Innoboxrr\LaravelAudit\Http\Requests\LoginAttempt\CreateRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateEvent
{

    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $loginAttempt;

    public $request;

    public $response;

    public $locale;

    public function __construct(LoginAttempt $loginAttempt, CreateRequest $request, $response)
    {
        
        $this->loginAttempt = $loginAttempt;

        $this->request = $request;

        $this->response = $response;

        $this->locale = ($this->request->hasSession() && 
            $this->request->getSession()->has('locale')) ? 
            $this->request->getSession()->get('locale') : 
            'en';

        App::setLocale($this->locale);

    }

    public function broadcastOn()
    {

        return new PrivateChannel('channel-name');

    }


}