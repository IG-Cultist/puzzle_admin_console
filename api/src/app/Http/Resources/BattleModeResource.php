<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BattleModeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon_name' => $this->icon_name,
            'user_id' => $this->user_id,
            'match_num' => $this->match_num,
            'last_match_at' => $this->last_match_at,
            'point' => $this->point,
            'created_at' => $this->created_at->format('Y/m/d/H:i:s'),
            'updated_at' => $this->updated_at->format('Y/m/d/H:i:s')
        ];
    }
}
