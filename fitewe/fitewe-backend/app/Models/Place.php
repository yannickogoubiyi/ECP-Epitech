<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [

        'place_name',
        'place_description',
        'place_address',
        'place_location',
        'type',
        'added_by',
        'likes_count',
        'dislikes_count',
        'dest_id'
        
    ];

    public function destinations()
    {
        return $this->belongsTo('App\Models\Destination', 'dest_id');
    }
    public function placeImages()
    {
        return $this->hasMany('App\Models\PlaceImage','place_id');
    }

}
