<?php
namespace ConfrariaWeb\Crm\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Select2StepResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'text' => $this->name
        ];
    }
}
