<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationImage extends Model
{
    use HasFactory;

    protected $table = 'dest_img';
    protected $fillable = [

        'dest_id',
        'pics'
        
    ];
}
