<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\VisitController;
use App\Models\User;
use App\Models\Itinerary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class VisitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test adding itinerary to visit list.
     *
     * @return void
     */
    public function test_visitlist()
    {
        // Create a user and an itinerary
        $user = User::factory()->create();
        $itinerary = Itinerary::factory()->create();
        $itineraryId = $itinerary->id;

        // Make request to addToVisitList method
        $response = $this->actingAs($user)
            ->postJson('/api/itineraries/'.$itineraryId.'/visit');

        // Assert response status and message
        $response->assertStatus(200)
            ->assertJson(['message' => 'Itinerary added to visit list']);

        // Assert that the itinerary is added to user's visit list
        $this->assertTrue($user->visits()->where('itinerary_id', $itineraryId)->exists());
    }
}
