<?php

namespace MeridienClube\Meridien\Historics;

use ConfrariaWeb\Historic\Contracts\HistoricContract;
use MeridienClube\Meridien\Models\Step;

class StepDeletedHistoricContract implements HistoricContract
{
    protected $step;

    public function __construct(Step $step)
    {
        $this->step = $step;
    }

    public function data()
    {
        return [
            'action' => 'deleted',
            'content' => 'Etapa ' . $this->step->name . ' foi deletada'
        ];
    }

    public function title()
    {
        return 'Etapa deletado';
    }

    public function user($collunn = null)
    {
        if($collunn == 'id'){
            return auth()->id();
        }
        return auth()->user();
    }
}
