@extends('layout')

@section('title', 'Edit Pet')

@section('content')
    <h1>Edit Pet</h1>

    <form action="{{ route('pets.update', $pet['id']) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $pet['name'] }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="available" {{ $pet['status'] == 'available' ? 'selected' : '' }}>Available</option>
                <option value="pending" {{ $pet['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="sold" {{ $pet['status'] == 'sold' ? 'selected' : '' }}>Sold</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Pet</button>
    </form>
@endsection
