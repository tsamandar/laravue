<?php

namespace App\Laravue\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'comfortables';
    protected $fillable = [
        'title_ru',
        'title_uz',
    ];
}
