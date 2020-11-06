<?PHP

namespace ConfrariaWeb\Crm\Repositories;

use ConfrariaWeb\Crm\Contracts\SegmentContract;
use ConfrariaWeb\Crm\Models\Segment;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class SegmentRepository implements SegmentContract
{
    use RepositoryTrait;

    function __construct(Segment $segment)
    {
        $this->obj = $segment;
    }

    public function where(array $data = [])
    {
        if (isset($data['name'])) {
            $this->obj = $this->obj->where('name', 'like', '%' . $data['name'] . '%');
        }
        return $this;
    }

}
