<?php

namespace Tests\Unit\Controllers;
use App\Http\Controllers\ItineraryController;
use App\Http\Requests\ItineraryRequest;
use App\Http\Requests\ItineraryUpdateRequest;
use App\Models\Itinerary;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Http\Request;
use Mockery\MockInterface;

class ItineraryTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->controller = new ItineraryController();
    }

    public function test_index()
    {
        // Create a mock instance of Request
        $request = $this->mock(Request::class, function (MockInterface $mock) {
            $mock->shouldReceive('input')->once()->andReturn([]);
        });

        // Call the index method
        $response = $this->controller->index($request);

        // Assert the response status code
        $this->assertEquals(200, $response->getStatusCode());

        // Assert the response content
        $content = $response->getContent();
        $responseData = json_decode($content, true);
        $this->assertEquals('success', $responseData['status']);
        $this->assertArrayHasKey('itineraries', $responseData);
    }
    public function test_store()
    {
        Storage::fake('public');
        UploadedFile::fake()->image('itinerary.jpg');

        // Mock the ItineraryRequest
        $request = $this->createMock(ItineraryRequest::class);
        $request->expects($this->once())
            ->method('validated')
            ->willReturn([
                'title' => 'Itinerary',
                'category' => 'monument',
                'duration' => '3 jours',
                'destinations' => json_encode(['Destination 1', 'Destination 2']),
                'image' => UploadedFile::fake()->image('itinerary.jpg'),
            ]);

        // Call the store method
        $response = $this->controller->store($request);

        // Assert the response
        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Itinerary created successfully', $response['message']);
        $this->assertArrayHasKey('itinerary', $response);
    }

    public function test_update()
    {
        // Mock an existing itinerary
        $itinerary = new Itinerary([
            'title' => 'Itinerary',
            'category' => 'monument',
            'duration' => '2 jours',
            'destinations' => json_encode(['Destination 1',  'Destination 2']),
        ]);

        // Mock the ItineraryUpdateRequest
        $request = $this->createMock(ItineraryUpdateRequest::class);
        $request->expects($this->once())
            ->method('validated')
            ->willReturn([
                'title' => 'Updated Itinerary',
            ]);

        // Call the update method
        $response = $this->controller->update($request, $itinerary);

        // Assert the response
        $this->assertEquals('success', $response['status']);
        $this->assertEquals('Itinerary updated successfully', $response['message']);
        $this->assertArrayHasKey('itinerary', $response);
    }
}
