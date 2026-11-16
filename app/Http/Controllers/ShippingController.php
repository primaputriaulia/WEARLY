<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ShippingController extends Controller
{
    // MENCARI LOKASI TUJUAN
            
        private function getLocationData($endpoint)
        {
            $apiKey = config('services.rajaongkir.api_key');
            $baseUrl = config('services.rajaongkir.base_url');

            if (!$apiKey || !$baseUrl) {
                return response()->json([
                    'success' => false,
                    'message' => 'Konfigurasi RajaOngkir belum tersedia.'
                ], 500);
            }

            try {
                $response = Http::timeout(30)
                    ->withHeaders(['key' => $apiKey])
                    ->get($baseUrl . $endpoint);

                if (!$response->successful()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal mengambil data lokasi.'
                    ], 500);
                }

                return response()->json([
                    'success' => true,
                    'data' => $response->json('data') ?? []
                ]);

            } catch (\Throwable $e) {
                report($e);

                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat terhubung ke layanan lokasi.'
                ], 500);
            }
        }

        public function provinces()
        {
            return $this->getLocationData('/destination/province');
        }

        public function cities($provinceId)
        {
            return $this->getLocationData(
                '/destination/city/' . $provinceId
            );
        }

        public function districts($cityId)
        {
            return $this->getLocationData(
                '/destination/district/' . $cityId
            );
        }

        public function subdistricts($districtId)
        {
            return $this->getLocationData(
                '/destination/sub-district/' . $districtId
            );
        }

    public function searchDestination(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:3',
        ]);

        $response = Http::timeout(30)
            ->withHeaders([
                'key' => config('services.rajaongkir.api_key'),
            ])
            ->get(
                config('services.rajaongkir.base_url') . '/destination/domestic-destination',
                [
                    'search' => $request->search,
                    'limit' => 10,
                    'offset' => 0,
                ]
            );

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mencari lokasi tujuan.',
            ], 500);
        }

        return response()->json([
            'success' => true,
            'data' => $response->json('data') ?? [],
        ]);
    }


    // MENGAMBIL PILIHAN ONGKIR DARI RAJAONGKIR
    public function calculateCost(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|integer',
            'weight' => 'required|integer|min:1',
            'courier' => 'required|in:jne:jnt:sicepat',
        ]);

        $apiKey = config('services.rajaongkir.api_key');
        $baseUrl = config('services.rajaongkir.base_url');

        if (!$apiKey || !$baseUrl) {
            return response()->json([
                'success' => false,
                'message' => 'Konfigurasi RajaOngkir belum tersedia.',
            ], 500);
        }

        try {
            $allServices = [];

            // Mengambil tarif terendah dan tertinggi
            foreach (['lowest', 'highest'] as $priceType) {

                $response = Http::timeout(30)
                    ->asForm()
                    ->withHeaders([
                        'key' => $apiKey,
                    ])
                    ->post($baseUrl . '/calculate/domestic-cost', [
                        'origin' => 31590,
                        'destination' => $validated['destination_id'],
                        'weight' => $validated['weight'],
                        'courier' => $validated['courier'],
                        'price' => $priceType,
                    ]);

                if (!$response->successful()) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Gagal mengambil pilihan layanan pengiriman.',
                    ], 500);
                }

                $services = $response->json('data') ?? [];

                foreach ($services as $service) {
                    $key = ($service['code'] ?? '') . '-' .
                        ($service['service'] ?? '');

                    // Menghindari layanan yang sama muncul dua kali
                    $allServices[$key] = $service;
                }
            }

            return response()->json([
                'success' => true,
                'data' => array_values($allServices),
            ]);

        } catch (\Throwable $e) {
            report($e);

            return response()->json([
                'success' => false,
                'message' => 'Tidak dapat terhubung ke layanan RajaOngkir.',
            ], 500);
        }
    }
}
