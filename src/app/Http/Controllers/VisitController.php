<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Itinerary;
use App\Models\Visit;
class VisitController extends Controller
{


public function addToVisitList(Request $request, $itineraryId)
{
    $user = auth()->user();
    $itinerary = Itinerary::find($itineraryId);

    if (!$itinerary) {
        return response()->json(['message' => 'Itinerary not found'], 404);
    }

    // Vérifiez si l'utilisateur a déjà ajouté cet itinéraire à sa liste à visiter
    if ($user->visits()->where('itinerary_id', $itineraryId)->exists()) {
        return response()->json(['message' => 'Itinerary already added to visit list'], 400);
    }

    // Créez une nouvelle entrée dans la liste à visiter de l'utilisateur
    $visitList = new Visit();
    $visitList->user_id = $user->id;
    $visitList->itinerary_id = $itineraryId;
    $visitList->save();

    return response()->json(['message' => 'Itinerary added to visit list'], 200);
}

}
