<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visit_lists';

    protected $fillable = ['user_id', 'itinerary_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itinerary()
    {
        return $this->belongsTo(Itinerary::class, 'itinerary_id'); 
    }
}

