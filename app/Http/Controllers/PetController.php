<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class PetController extends Controller
{
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
}
