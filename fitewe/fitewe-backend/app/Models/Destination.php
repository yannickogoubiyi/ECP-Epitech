<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [

        'dest_name',
        'dest_description'
        
    ];

    public function places()
    {
        return $this->hasMany('App\Models\Place','dest_id');
    }
    public function destinationImages()
    {
        return $this->hasMany('App\Models\DestinationImage','dest_id');
    }
}
