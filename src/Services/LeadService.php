<?PHP

namespace ConfrariaWeb\Crm\Services;

use ConfrariaWeb\Crm\Contracts\LeadContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class LeadService
{
    use ServiceTrait;

    public function __construct(LeadContract $lead)
    {
        $this->obj = $lead;
    }

    public function prepareData(array $data)
    {
        $data['options'] = $data;
        return $data;
    }

}
