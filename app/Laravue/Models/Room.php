<?php

namespace App\Laravue\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'rooms';
    protected $fillable = [
        'hotel_id',
        'title',
        'type',
        'active',
        'price',
        'size',
        'photo',
        'photo_second',
        'color',
        'square',
        'status',
        'cleaned',
        'cleaned_type'
    ];
}
