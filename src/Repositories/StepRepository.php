<?PHP

namespace ConfrariaWeb\Crm\Repositories;

use ConfrariaWeb\Crm\Contracts\StepContract;
use ConfrariaWeb\Crm\Models\Step;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class StepRepository implements StepContract
{
    use RepositoryTrait;

    function __construct(Step $step)
    {
        $this->obj = $step;
    }

    public function where(array $data = [], $take = null)
    {
        if (isset($data['name'])) {
            $this->obj = $this->obj->where('name', 'like', '%' . $data['name'] . '%');
        }
        return $this;
    }

}
