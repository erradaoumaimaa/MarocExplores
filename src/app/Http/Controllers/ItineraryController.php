<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItineraryRequest;
use Illuminate\Http\Request;

class ItineraryController extends Controller
{
    public function store(ItineraryRequest $request)
    {
        $data = $request->validated();
    }
}
