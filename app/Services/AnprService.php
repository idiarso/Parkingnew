<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class AnprService
{
    private $apiKey;
    private $baseUrl = 'https://api.openalpr.com/v2';

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function processPlate($imagePath)
    {
        try {
            $imageData = file_get_contents($imagePath);
            
            $response = Http::post($this->baseUrl . '/recognize_bytes', [
                'image_bytes' => base64_encode($imageData),
                'secret_key' => $this->apiKey,
                'country' => 'id', // Kode negara Indonesia
                'recognize_vehicle' => 1,
                'return_image' => 0,
                'topn' => 1
            ]);

            if ($response->successful()) {
                $result = $response->json();
                if (isset($result['results'][0]['plate'])) {
                    return [
                        'success' => true,
                        'plate_number' => $result['results'][0]['plate'],
                        'confidence' => $result['results'][0]['confidence']
                    ];
                }
            }

            return [
                'success' => false,
                'message' => 'No plate detected'
            ];

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}