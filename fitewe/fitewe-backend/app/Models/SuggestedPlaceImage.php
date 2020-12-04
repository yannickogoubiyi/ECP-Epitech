<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedPlaceImage extends Model
{
    use HasFactory;

    protected $table = 'sugg_img';
    protected $fillable = [

        'sugg_id',
        'pics'
        
    ];

    public function suggPlaces()
    {
        return $this->belongsTo('App\Models\SuggestedPlace', 'sugg_id');
    }
}
