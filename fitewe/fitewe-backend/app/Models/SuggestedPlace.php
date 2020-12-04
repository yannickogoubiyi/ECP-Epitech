<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuggestedPlace extends Model
{
    use HasFactory;

    protected $table = 'suggested_places';
    protected $fillable = [

        'sugg_name',
        'sugg_type_id',
        'sugg_address',
        'sugg_description',
        'sugg_location',
        'user_id'
        
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function suggestedPlaceImages()
    {
        return $this->hasMany('App\Models\SuggestedPlaceImage','sugg_id');
    }
}
