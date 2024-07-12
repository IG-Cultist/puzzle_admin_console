<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserMailResource extends JsonResource
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
            'mail_text' => $this->text,
            'isOpen' => $this->pivot->isOpen,
            'created_at' => $this->created_at->format('Y/m/d/H:i:s'),
            'updated_at' => $this->updated_at->format('Y/m/d/H:i:s')
        ];
    }
}
