<?PHP

namespace ConfrariaWeb\Crm\Repositories;

use ConfrariaWeb\Crm\Contracts\LeadContract;
use ConfrariaWeb\Crm\Models\Lead;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class LeadRepository implements LeadContract
{
    use RepositoryTrait;

    function __construct(Lead $lead)
    {
        $this->obj = $lead;
    }

    public function where(array $data = [])
    {
        if (isset($data['name'])) {
            $this->obj = $this->obj->where('name', 'like', '%' . $data['name'] . '%');
        }
        return $this;
    }

}
