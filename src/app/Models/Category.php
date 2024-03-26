<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $guarded = [];

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class, 'category', 'name');
    }
}
