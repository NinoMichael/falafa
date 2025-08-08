<?php

namespace App\Http\Resources\Estate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EstateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $typeData = null;

        if ($this->type instanceof \App\Models\House) {
            $typeData = [
                'id' => $this->type->id,
                'type' => $this->type->type,
                'bedroom' => $this->type->bedroom,
                'bathroom' => $this->type->bathroom,
                'living_room' => $this->type->living_room,
                'kitchen' => $this->type->kitchen,
                'garden' => $this->type->garden,
                'garage' => $this->type->garage,
                'floor_count' => $this->type->floor_count,
                'furnished' => $this->type->furnished,
            ];
        } elseif ($this->type instanceof \App\Models\Apartment) {
            $typeData = [
                'id' => $this->type->id,
                'category' => $this->type->category,
                'floor_number' => $this->type->floor_number,
                'building_name' => $this->type->building_name,
                'rooms' => $this->type->rooms,
            ];
        } elseif ($this->type instanceof \App\Models\Field) {
            $typeData = [
                'id' => $this->type->id,
                'type' => $this->type->type,
                'is_fenced' => $this->type->is_fenced,
                'road_access' => $this->type->road_access,
            ];
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'field' => $this->type_type === 'fields' ? $typeData : null,
            'house' => $this->type_type === 'houses' ? $typeData : null,
            'apartment' => $this->type_type === 'apartments' ? $typeData : null,
            'sell_price' => $this->sell_price,
            'rent_price' => $this->rent_price,
            'area' => $this->area,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'address' => $this->address,
            'city' => $this->city ? [
                'id' => $this->city->id,
                'name' => $this->city->name,
                'province' => $this->city->province,
            ] : null,
            'promoter' => $this->promoter ? [
                'id' => $this->promoter->id,
                'user_id' => $this->promoter->user_id,
                'status' => $this->promoter->status,
            ] : null,
            'agency' => null,
            'visitor' => null,
            'is_validated' => $this->is_validated,
            'status' => $this->status,
            'cover_image' => $this->cover_image,
            'water' => $this->water,
            'electricity' => $this->electricity,
            'views_count' => $this->views_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }


}
