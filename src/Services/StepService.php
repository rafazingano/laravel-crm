<?PHP

namespace ConfrariaWeb\Crm\Services;

use ConfrariaWeb\Crm\Contracts\StepContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class StepService
{
    use ServiceTrait;

    public function __construct(StepContract $step)
    {
        $this->obj = $step;
    }

}
