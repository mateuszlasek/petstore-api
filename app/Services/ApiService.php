<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService
{
    private $apiUrl = 'https://petstore.swagger.io/v2';

    public function findPetsByStatus(string $status = 'available'): ?array
    {
        try {
            $response = Http::get("{$this->apiUrl}/pet/findByStatus", [
                'status' => $status,
            ]);

            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            Log::error('Error fetching pets by status', [
                'status' => $status,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return null;
        }
    }

    public function getPetById(int $id): ?array
    {
        try {
            $response = Http::get("{$this->apiUrl}/pet/{$id}");

            return $response->successful() ? $response->json() : null;
        } catch (\Exception $e) {
            Log::error('Error fetching pet by ID', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return null;
        }
    }

    public function createPet(array $data): bool
    {
        try {
            $response = Http::post("{$this->apiUrl}/pet", $data);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Error creating pet', [
                'data' => $data,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return false;
        }
    }

    public function updatePet(array $data): bool
    {
        try {
            $response = Http::put("{$this->apiUrl}/pet", $data);

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Error updating pet', [
                'data' => $data,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return false;
        }
    }

    public function deletePet(int $id): bool
    {
        try {
            $response = Http::delete("{$this->apiUrl}/pet/{$id}");

            return $response->successful();
        } catch (\Exception $e) {
            Log::error('Error deleting pet', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return false;
        }
    }
}
