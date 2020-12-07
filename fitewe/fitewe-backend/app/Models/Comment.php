<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'place_id',
        'comment',
        
    ];
    public function places()
    {
        return $this->belongsTo('App\Models\Place', 'place_id');
    }
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
