<?PHP

namespace ConfrariaWeb\Crm\Services;

use ConfrariaWeb\Crm\Contracts\SegmentContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class SegmentService
{
    use ServiceTrait;

    public function __construct(SegmentContract $segment)
    {
        $this->obj = $segment;
    }

}
