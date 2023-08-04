<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            'name' => $this->name,
            'brand_id' => $this->brand_id,
            'actual_price' => $this->actual_price,
            'sale_price' => $this->sale_price,
            'total_stock' => $this->total_stock,
            'unit' => $this->unit,
            'more_information' => $this->more_information,
            'user_id' => $this->user_id,
            'photos' => $this->photos,
        ];
    }
}
