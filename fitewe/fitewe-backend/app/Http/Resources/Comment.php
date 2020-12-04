<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
          
        // return parent::toArray($request);
    
        return [
            
            'id' => $this->id,
            'content' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'misc' => [
                'place' => [
                    'place_id' => $this->place_id,
                    'place_name' => $this->places->place_name
                ],
                'posted_by' => [
                    'user_id' => $this->user_id,
                    'username' => $this->users->username,
                    'avatar' => $this->users->avatar
                ]
        ]];

    }
}
