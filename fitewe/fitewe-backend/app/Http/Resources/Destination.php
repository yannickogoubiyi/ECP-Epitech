<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Destination extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // return [
            
        //     'id' => $this->id,
        //     'dest_name' => $this->dest_name,
        //     'dest_description' => $this->dest_description,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        //     'misc' => [
        //         'places' => [
        //             'place_id' => $this->places->id,
        //             'place_name' => $this->places->place_name
        //         ],
        // ]];
    }
}
