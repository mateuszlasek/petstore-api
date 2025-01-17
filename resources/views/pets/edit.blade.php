<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pet</title>
</head>
<body>
<h1>Edit Pet</h1>

<form action="{{ route('pets.update', $pet['id']) }}" method="POST">
    @method('PUT')
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $pet['name'] }}" required>
    <br>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" value="{{ $pet['status'] }}" required>
    <br>

    <button type="submit">Update Pet</button>
</form>
</body>
</html>
