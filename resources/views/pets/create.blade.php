<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Pet</title>
</head>
<body>
<h1>Create a New Pet</h1>

<form action="{{ route('pets.store') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="status">Status:</label>
    <input type="text" id="status" name="status" required>
    <br>

    <button type="submit">Add Pet</button>
</form>
</body>
</html>
