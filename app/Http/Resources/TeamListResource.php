<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamListResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "teamA" => [$this->teamA,
                "id" => $this->id,
                "name" => $this->name,
                "rating" => $this->rating,
            ],
                "teamB" => [$this->teamB,
                "id" => $this->id,
                "name" => $this->name,
                "rating" => $this->rating,
            ],
        ];    
    }
}
