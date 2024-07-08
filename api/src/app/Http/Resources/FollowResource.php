<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FollowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'follow_id' => $this->follow_id,
            'locate' => $this->pivot->locate,
            'created_at' => $this->created_at->format('Y/m/d/H:i:s'),
            'updated_at' => $this->updated_at->format('Y/m/d/H:i:s')
        ];
    }
}
