<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'email' => $this->email,
            'role' => $this->role,
            'contact' => $this->contact,
            'avatar_path' => $this->avatar_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        $roleMappings = [
            'visitor' => [
                'model' => 'visitor', 
                'fields' => ['status', 'verified_at']
            ],
            'promoter' => [
                'model' => 'promoter', 
                'fields' => ['facebook_link', 'status', 'verified_at']
            ],
            'agency' => [
                'model' => 'agency', 
                'fields' => ['company_name', 'facebook_link', 'nif', 'responsible_name', 'stat', 'website_url']
            ],
            'admin' => [
                'model' => 'admin', 
                'fields' => []
            ],
        ];

        if (isset($roleMappings[$this->role])) {
            $relation = $roleMappings[$this->role]['model'];
            $fields = $roleMappings[$this->role]['fields'];
            $relatedData = $this->$relation;

            if ($relatedData) {
                $data["{$relation}_info"] = array_merge(
                    ['id' => $relatedData->id, 'created_at' => $relatedData->created_at, 'updated_at' => $relatedData->updated_at],
                    array_intersect_key($relatedData->toArray(), array_flip($fields))
                );
            }
        }

        return $data;
    }
}
