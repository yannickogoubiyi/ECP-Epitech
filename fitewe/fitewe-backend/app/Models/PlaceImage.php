<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PlaceImageController;

class PlaceImage extends Model
{
    use HasFactory;

    protected $table = 'place_img';
    protected $fillable = [

        'place_id',
        'pics'
        
    ];

    public function places()
    {
        return $this->belongsTo('App\Models\Place', 'place_id');
    }
}
