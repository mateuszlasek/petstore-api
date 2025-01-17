<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets List</title>
</head>
<body>
<h1>Available Pets</h1>

@if(!empty($pets))
    <ul>
        @foreach($pets as $pet)
            <li>
                ID: {{ $pet['id'] }}, Name: {{ $pet['name'] ?? 'Unknown' }}, Status: {{ $pet['status'] ?? 'Unknown' }}
            </li>
        @endforeach
    </ul>
@else
    <p>No pets available.</p>
@endif
</body>
</html>
