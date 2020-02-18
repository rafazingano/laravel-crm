<?php

namespace ConfrariaWeb\Crm\Events;

use ConfrariaWeb\Crm\Historics\StepCreatedHistoricContract;
use ConfrariaWeb\Crm\Models\Step;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StepCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $obj;
    public $historic;

    public function __construct(Step $step)
    {
        $this->obj = $step;
        $this->historic = new StepCreatedHistoricContract($step);
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
