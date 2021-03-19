<?php

namespace Sil2\VfApi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WidgetResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     *///'users' => User::collection($this->whenLoaded('users')),
    public function toArray($request)
    {
        return [
            'id'              => $this->id,
            'name'              => $this->name,
            'description'              => $this->description,
        ];
    }

}
