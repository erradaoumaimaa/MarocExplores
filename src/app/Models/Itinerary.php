<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'destinations' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(Itinerary::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category', 'name');
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
