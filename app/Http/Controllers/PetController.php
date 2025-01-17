<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class PetController extends Controller
{
    private ApiService $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $pets = $this->apiService->findPetsByStatus();

        if (is_null($pets)) {
            return redirect()->route('pets.index')->withErrors(['error' => 'Failed to fetch pets.']);
        }

        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        return view('pets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
        ];

        if ($this->apiService->createPet($data)) {
            return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
        }

        return back()->withErrors(['error' => 'Failed to add pet.']);
    }

    public function edit($id)
    {
        $pet = $this->apiService->getPetById($id);

        if (is_null($pet)) {
            return redirect()->route('pets.index')->withErrors(['error' => 'Pet not found.']);
        }

        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|string',
        ]);

        $data = [
            'id' => $id,
            'name' => $request->name,
            'status' => $request->status,
        ];

        if ($this->apiService->updatePet($data)) {
            return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
        }

        return back()->withErrors(['error' => 'Failed to update pet.']);
    }


    public function destroy($id)
    {
        if ($this->apiService->deletePet($id)) {
            return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
        }

        return redirect()->route('pets.index')->withErrors(['error' => 'Failed to delete pet.']);
    }
}
