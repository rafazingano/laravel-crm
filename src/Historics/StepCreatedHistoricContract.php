<?php

namespace MeridienClube\Meridien\Historics;

use ConfrariaWeb\Historic\Contracts\HistoricContract;
use MeridienClube\Meridien\Models\Step;

class StepCreatedHistoricContract implements HistoricContract
{
    protected $step;

    public function __construct(Step $step)
    {
        $this->step = $step;
    }

    public function data()
    {
        return [
            'action' => 'created',
            'content' => 'Etapa ' . $this->step->name . ' foi criada',
            'additions' => historic_change($this->step)
        ];
    }

    public function title()
    {
        return 'Etapa criada';
    }

    public function user($collunn = null)
    {
        if ($collunn == 'id') {
            return auth()->id();
        }
        return auth()->user();
    }
}
