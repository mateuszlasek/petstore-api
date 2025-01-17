@extends('layout')

@section('title', 'Available Pets')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Available Pets</h1>
        <a href="{{ route('pets.create') }}" class="btn btn-primary">Add Pet</a>
    </div>

    <div class="card">
        <div class="card-body">
            <ul class="list-group">
                @foreach($pets as $pet)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $pet['name'] ?? "Unknown"}}</strong> ({{ $pet['status'] }})
                        </div>
                        <div>
                            <a href="{{ route('pets.edit', $pet['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('pets.destroy', $pet['id']) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
