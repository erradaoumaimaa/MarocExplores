<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Itinéraires</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Durée</th>
                    <th>Image</th>
                    <th>Destinations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itineraries as $itinerary)
                    <tr>
                        <td>{{ $itinerary->id }}</td>
                        <td>{{ $itinerary->title }}</td>
                        <td>{{ $itinerary->category }}</td>
                        <td>{{ $itinerary->duration }}</td>
                        <td>
                            @if ($itinerary->image)
                                <img src="{{ asset('storage/images/' . $itinerary->image) }}" alt="Image">
                            @else
                                Pas d'image
                            @endif
                        </td>
                        {{-- <td>
                            @foreach ($itinerary->destinations as $destination)
                                <p>{{ $destination->name }} - {{ $destination->location }}</p>
                            @endforeach
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
