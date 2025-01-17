<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
class ApiService
{
    private $apiUrl;
    public function __construct()
    {
        $this->apiUrl = 'https://petstore.swagger.io/v2';
    }

}
