<?php

namespace MeridienClube\Meridien\Historics;

use ConfrariaWeb\Historic\Contracts\HistoricContract;
use MeridienClube\Meridien\Models\Step;

class StepUpdatedHistoricContract implements HistoricContract
{
    protected $step;

    public function __construct(Step $step)
    {
        $this->step = $step;
    }

    public function data()
    {
        return [
            'action' => 'updated',
            'content' => 'Etapa ' . $this->step->name . ' foi atualizado',
            'changes' => historic_change($this->step)
        ];
    }

    public function title()
    {
        return 'Etapa atualizada';
    }

    public function user($collunn = null)
    {
        if($collunn == 'id'){
            return auth()->id();
        }
        return auth()->user();
    }
}
